import sys
if sys.platform != 'linux':
  print("Not linux env.")
  exit()
import os

setting = sys.argv[1]
data = []
#filename = "/etc/network/interfaces.settings"
filename = "/etc/network/interfaces"

if setting == '3':

    # wifi
    ssid = sys.argv[2]
    psk = sys.argv[3]
    data.append("source-directory /etc/network/interfaces.d")
    data.append("auto lo")
    data.append("iface lo inet loopback")
    data.append("iface eth0 inet dhcp")
    data.append("allow-hotplug wlan0")
    data.append("auto wlan0")
    data.append("iface wlan0 inet dhcp")
    data.append("wpa-ssid \"{0}\"".format(ssid))
    data.append("wpa-psk \"{0}\"".format(psk))

elif setting == '1':
#  dhcp
    data.append("auto lo eth0")
    data.append("iface lo inet loopback")
    data.append("iface eth0 inet dhcp")

elif setting == '2':
    address = sys.argv[2]
    netmask = sys.argv[3]
    gateway = sys.argv[4]
#  static
    data.append("auto lo eth0")
    data.append("iface lo inet loopback")
    data.append("iface eth0 inet static")
    data.append("address {0}".format(address))
    data.append("netmask {0}".format(netmask))
    data.append("gateway {0}".format(gateway))


file = open(filename, "w", encoding='UTF-8')
file.write('\n'.join(data))
file.close()

os.system('/etc/init.d/networking restart')
