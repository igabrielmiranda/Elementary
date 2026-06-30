#ifndef FRAMEWORK_PLATFORM_WIN32PROCESSHELPER_H
#define FRAMEWORK_PLATFORM_WIN32PROCESSHELPER_H

#ifdef _WIN32

#include <windows.h>

#include <filesystem>
#include <string>
#include <vector>

#include <framework/stdext/stdext.h>

namespace win32process
{
struct LaunchResult {
    bool started = false;
    bool timedOut = false;
    DWORD exitCode = STILL_ACTIVE;
    DWORD errorCode = ERROR_SUCCESS;
};

inline std::filesystem::path currentExecutablePath()
{
    std::wstring buffer(MAX_PATH, L'\0');
    while (true) {
        DWORD length = GetModuleFileNameW(nullptr, buffer.data(), static_cast<DWORD>(buffer.size()));
        if (length == 0) {
            return {};
        }

        if (length < buffer.size() - 1) {
            buffer.resize(length);
            return std::filesystem::path(buffer);
        }

        buffer.resize(buffer.size() * 2);
    }
}

inline std::wstring quoteCommandLineArg(const std::wstring& arg)
{
    if (arg.empty()) {
        return L"\"\"";
    }

    if (arg.find_first_of(L" \t\n\v\"") == std::wstring::npos) {
        return arg;
    }

    std::wstring quoted;
    quoted.reserve(arg.size() + 2);
    quoted.push_back(L'"');

    std::size_t backslashes = 0;
    for (wchar_t ch : arg) {
        if (ch == L'\\') {
            ++backslashes;
            continue;
        }

        if (ch == L'"') {
            quoted.append(backslashes * 2 + 1, L'\\');
            quoted.push_back(L'"');
            backslashes = 0;
            continue;
        }

        quoted.append(backslashes, L'\\');
        backslashes = 0;
        quoted.push_back(ch);
    }

    quoted.append(backslashes * 2, L'\\');
    quoted.push_back(L'"');
    return quoted;
}

inline std::wstring buildCommandLine(const std::filesystem::path& executable, const std::vector<std::string>& args)
{
    std::wstring commandLine = quoteCommandLineArg(executable.wstring());
    for (const auto& arg : args) {
        commandLine.push_back(L' ');
        commandLine += quoteCommandLineArg(stdext::utf8_to_utf16(arg));
    }
    return commandLine;
}

inline LaunchResult launchProcess(const std::filesystem::path& executable, const std::vector<std::string>& args, DWORD waitMs)
{
    LaunchResult result;
    if (executable.empty()) {
        result.errorCode = ERROR_FILE_NOT_FOUND;
        return result;
    }

    std::wstring executablePath = executable.wstring();
    std::wstring commandLine = buildCommandLine(executable, args);
    std::vector<wchar_t> mutableCommandLine(commandLine.begin(), commandLine.end());
    mutableCommandLine.push_back(L'\0');

    STARTUPINFOW startupInfo = {};
    startupInfo.cb = sizeof(startupInfo);
    PROCESS_INFORMATION processInfo = {};

    if (!CreateProcessW(executablePath.c_str(), mutableCommandLine.data(), nullptr, nullptr, FALSE, 0, nullptr, nullptr, &startupInfo, &processInfo)) {
        result.errorCode = GetLastError();
        return result;
    }

    result.started = true;

    DWORD waitResult = WaitForSingleObject(processInfo.hProcess, waitMs);
    if (waitResult == WAIT_TIMEOUT) {
        result.timedOut = true;
    } else if (waitResult == WAIT_OBJECT_0) {
        if (!GetExitCodeProcess(processInfo.hProcess, &result.exitCode)) {
            result.errorCode = GetLastError();
        }
    } else {
        result.errorCode = GetLastError();
    }

    CloseHandle(processInfo.hThread);
    CloseHandle(processInfo.hProcess);
    return result;
}
}

#endif

#endif
