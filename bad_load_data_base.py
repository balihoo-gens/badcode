###############################################
## data loader. Run as a cron job evey minute
###############################################
import sqlite3
import factory
import time

c = sqlite3.connect("plants.db").cursor()

end = time.time() + 2
last = time.time()
while (time.time() < end):
    if (time.time() - last > 1):
        last = time.time()
        plant = -1
        for row in c.execute("SELECT * FROM Plants WHERE Name = 'PlantZero'"):
            plant = row[0]
        system = -1
        for row in c.execute("SELECT * FROM Systems WHERE Type = 'Turbine'"):
            if row[2] == plant:
                system = row[0]
        sensor = -1
        for row in c.execute("SELECT * FROM Sensors WHERE Type = 'Humidity'"):
            if row[2] == system:
                sensor = row[0]
        value = factory.get_sensor_value('PlantZero', 'Turbine', 'Humidity')
        c.execute("INSERT INTO SensorValues VALUES (" + str(time.time()) + "," + str(sensor) + "," + str(value) + ")")


