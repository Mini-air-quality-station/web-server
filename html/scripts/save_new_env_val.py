#!/usr/bin/env python3

import sys
import fcntl
import configparser

'''
Script to save new sensor measure frequency data from configuration website.
USAGE:
./save_new_env_val.py "new_value env_name"
'''
LOCK_PATH = "/etc/mini-air-quality/envs.lock"
CONFIG_PATH = "/etc/mini-air-quality/sensors_config.ini"

if __name__ == '__main__':
    config = configparser.ConfigParser()
    data = sys.argv[1].rstrip().lstrip() # Just to make sure
    sensor_args = data.split(" ")
    new_value, sensor_name = sensor_args[0], sensor_args[1]
    
    # Read current value from config, modify and save it.
    with open(LOCK_PATH, 'w') as lock:
        try:
            fcntl.flock(lock, fcntl.LOCK_EX)

            config.read(CONFIG_PATH)
            config.set('sensors_config', sensor_name, new_value)
            with open(CONFIG_PATH, 'w') as configfile:
                config.write(configfile)

            fcntl.flock(lock, fcntl.LOCK_UN)
        except:
            pass
