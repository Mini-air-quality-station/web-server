#!/usr/bin/env python3

import sys
import configparser
import yaml
import json
import fcntl

'''
Script to read data describing a sensor.
If there are multiple active sensors you need to precise sensor occurence order
USAGE:
./get_sensor_info.py temperature_sensor.yaml 1
'''

SPECS_PATH = "/etc/mini-air-quality/sensor-spec/"
LOCK_PATH = "/etc/mini-air-quality/envs.lock"
CONFIG_PATH = "/etc/mini-air-quality/sensors_config.ini"

if __name__ == '__main__':
    requested_filename = sys.argv[1]
    config = configparser.ConfigParser()

    with open(SPECS_PATH+requested_filename, 'r') as spec_file:
        sensors_data = yaml.load(spec_file, Loader=yaml.SafeLoader)
        sensors = sensors_data['sensors']
        active_sensors = list(filter(lambda sensor: sensor['active'] == True, sensors))
        if len(active_sensors) > 1:
            sensor_no = int(sys.argv[2])
            active_sensor = active_sensors[sensor_no]
        else:
            active_sensor = active_sensors[0]

        # Read current value from config
        with open(LOCK_PATH, 'w') as lock:
            fcntl.flock(lock, fcntl.LOCK_SH) #Multiple reads allowed
            config.read(CONFIG_PATH)
            fcntl.flock(lock, fcntl.LOCK_UN)
            current_measure_freq = config['sensors_config'][active_sensor['env_name'].lower()]

        data = {
            'measure_freq_unit': str(active_sensor['measure_freq_unit']),
            'measure_freq_caps': str(active_sensor['measure_freq_caps']),
            'current_freq': str(current_measure_freq),
            'env_name': str(active_sensor['env_name'])
        }
        ret = json.dumps(data)
        print(ret)
