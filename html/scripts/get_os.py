#!/usr/bin/env python3

import subprocess

if __name__ == '__main__':
    os_revision = subprocess.run('cat /etc/issue', shell=True,
                                 capture_output=True, encoding='utf-8', check=True)
    assert os_revision.stdout
    # Remove \n \l
    # \n inserts the hostname (“nodename”)
    # \l inserts the tty line
    os_revision = os_revision.stdout.replace('\\n', "").replace('\\l', "")
    print(os_revision)
