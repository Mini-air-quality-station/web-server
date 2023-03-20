#!/usr/bin/env python3

import subprocess

if __name__ == '__main__':
    hostname = subprocess.run('hostnamectl', capture_output=True, encoding='utf-8', check=True)
    static_hostname = list(filter(lambda element: ("Static hostname" in element), hostname.stdout.splitlines()))
    assert static_hostname
    static_hostname = static_hostname[0].split(':')[1].lstrip()
    print(static_hostname)

