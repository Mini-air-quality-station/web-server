#!/usr/bin/env python3

import subprocess

if __name__ == '__main__':
    time = subprocess.run('timedatectl show --property=TimeUSec', shell=True, capture_output=True, encoding='utf-8', check=True)
    assert time.stdout
    time = time.stdout.split('=')[1].rstrip()
    print(time)