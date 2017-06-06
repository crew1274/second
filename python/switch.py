#! /usr/bin/env python
# -*- coding: utf-8 -*-
# vim:fenc=utf-8
#
# Copyright © 2016 pi <pi@pi-desktop>
#
# Distributed under terms of the MIT license.

import sys
if sys.platform != 'linux':
        print("Not linux env.")
        exit()

else:
        sys.path.insert(0, '/home/pi/workspace/DAESecondStage/')
import DAE.MySerial as serial
import DAE.MySQL as sql
import DAE.Common as common
import json
import datetime
import time

from openpyxl import Workbook

def main():
    global sqlObj, ser
    ser = serial.ModbusSerial()

    try:
        if len(sys.argv) != 3:
            raise Exception("param must be of length 3 but got ", len(sys.argv))

        group = int(sys.argv[1]) # group number
        switch = int(sys.argv[2]) # power on or off

        if group < 1 or group > 5:
            raise Exception("Group number error.")

        if switch != 0 and switch != 1:
            raise Exception("Only accept 1 or 0.")

        control(group, switch)

    except:
        common.printError(sys.exc_info())

    finally:
        common.log('close serial port.')
        ser.close()

def control(group, switch):
    n = 255 if switch == 1 else 0
    group = int(group - 1)

    response = ser.writeCommandToModbus([1, 5, 1, group, n, 0])
    print("Group: {0} is power {1}".format(group, ('on' if switch == 1 else 'off')))


if __name__ == "__main__":
    main()
