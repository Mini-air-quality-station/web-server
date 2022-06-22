#!/usr/bin/env python3

import subprocess
import sys

if __name__ == '__main__':
    date = sys.argv[1]
    timezone = sys.argv[2]
    timezone_set = subprocess.run(f"timedatectl set-timezone '{timezone}'",
                                  shell=True, capture_output=True, encoding='utf-8', check=True)
    date_set = subprocess.run(f"timedatectl set-time '{date}'",
                              shell=True, capture_output=True, encoding='utf-8', check=True)
