
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

        sensor=0
        for plant_row in c.execute("SELECT * FROM Plants WHERE Name = 'PlantZero' "):
            for sys_row in c.execute("SELECT * FROM Systems WHERE Type = 'Turbine'"):
                for sens_row in c.execute("SELECT * FROM Sensors WHERE Type = 'Humidity'"):
                    if sys_row[2] == plant_row[0] and sens_row[2] == sys_row[0]:
                        sensor = sens_row[0]
        value = factory.get_sensor_value('PlantZero', 'Turbine', 'Humidity')
        c.execute("INSERT INTO SensorValues VALUES (" + str(time.time()) + "," + str(sensor) + "," + str(value) + ")")
        sensor=0
        for plant_row in c.execute("SELECT * FROM Plants WHERE Name = 'PlantZero' "):
            for sys_row in c.execute("SELECT * FROM Systems WHERE Type = 'Turbine'"):
                for sens_row in c.execute("SELECT * FROM Sensors WHERE Type = 'Temperature'"):
                    if sys_row[2] == plant_row[0] and sens_row[2] == sys_row[0]:
                        sensor = sens_row[0]
        value = factory.get_sensor_value('PlantZero', 'Turbine', 'Temperature')
        c.execute("INSERT INTO SensorValues VALUES (" + str(time.time()) + "," + str(sensor) + "," + str(value) + ")")
        sensor=0
        for plant_row in c.execute("SELECT * FROM Plants WHERE Name = 'PlantZero' "):
            for sys_row in c.execute("SELECT * FROM Systems WHERE Type = 'Turbine'"):
                for sens_row in c.execute("SELECT * FROM Sensors WHERE Type = 'Pressure'"):
                    if sys_row[2] == plant_row[0] and sens_row[2] == sys_row[0]:
                        sensor = sens_row[0]
        value = factory.get_sensor_value('PlantZero', 'Turbine', 'Pressure')
        c.execute("INSERT INTO SensorValues VALUES (" + str(time.time()) + "," + str(sensor) + "," + str(value) + ")")
        sensor=0
        for plant_row in c.execute("SELECT * FROM Plants WHERE Name = 'PlantZero' "):
            for sys_row in c.execute("SELECT * FROM Systems WHERE Type = 'Teslacoil'"):
                for sens_row in c.execute("SELECT * FROM Sensors WHERE Type = 'Humidity'"):
                    if sys_row[2] == plant_row[0] and sens_row[2] == sys_row[0]:
                        sensor = sens_row[0]
        value = factory.get_sensor_value('PlantZero', 'Teslacoil', 'Humidity')
        c.execute("INSERT INTO SensorValues VALUES (" + str(time.time()) + "," + str(sensor) + "," + str(value) + ")")
        sensor=0
        for plant_row in c.execute("SELECT * FROM Plants WHERE Name = 'PlantZero' "):
            for sys_row in c.execute("SELECT * FROM Systems WHERE Type = 'Teslacoil'"):
                for sens_row in c.execute("SELECT * FROM Sensors WHERE Type = 'Temperature'"):
                    if sys_row[2] == plant_row[0] and sens_row[2] == sys_row[0]:
                        sensor = sens_row[0]
        value = factory.get_sensor_value('PlantZero', 'Teslacoil', 'Temperature')
        c.execute("INSERT INTO SensorValues VALUES (" + str(time.time()) + "," + str(sensor) + "," + str(value) + ")")
        sensor=0
        for plant_row in c.execute("SELECT * FROM Plants WHERE Name = 'PlantZero' "):
            for sys_row in c.execute("SELECT * FROM Systems WHERE Type = 'Teslacoil'"):
                for sens_row in c.execute("SELECT * FROM Sensors WHERE Type = 'Pressure'"):
                    if sys_row[2] == plant_row[0] and sens_row[2] == sys_row[0]:
                        sensor = sens_row[0]
        value = factory.get_sensor_value('PlantZero', 'Teslacoil', 'Pressure')
        c.execute("INSERT INTO SensorValues VALUES (" + str(time.time()) + "," + str(sensor) + "," + str(value) + ")")
        sensor=0
        for plant_row in c.execute("SELECT * FROM Plants WHERE Name = 'PlantZero' "):
            for sys_row in c.execute("SELECT * FROM Systems WHERE Type = 'Fluxcapacitor'"):
                for sens_row in c.execute("SELECT * FROM Sensors WHERE Type = 'Humidity'"):
                    if sys_row[2] == plant_row[0] and sens_row[2] == sys_row[0]:
                        sensor = sens_row[0]
        value = factory.get_sensor_value('PlantZero', 'Fluxcapacitor', 'Humidity')
        c.execute("INSERT INTO SensorValues VALUES (" + str(time.time()) + "," + str(sensor) + "," + str(value) + ")")
        sensor=0
        for plant_row in c.execute("SELECT * FROM Plants WHERE Name = 'PlantZero' "):
            for sys_row in c.execute("SELECT * FROM Systems WHERE Type = 'Fluxcapacitor'"):
                for sens_row in c.execute("SELECT * FROM Sensors WHERE Type = 'Temperature'"):
                    if sys_row[2] == plant_row[0] and sens_row[2] == sys_row[0]:
                        sensor = sens_row[0]
        value = factory.get_sensor_value('PlantZero', 'Fluxcapacitor', 'Temperature')
        c.execute("INSERT INTO SensorValues VALUES (" + str(time.time()) + "," + str(sensor) + "," + str(value) + ")")
        sensor=0
        for plant_row in c.execute("SELECT * FROM Plants WHERE Name = 'PlantZero' "):
            for sys_row in c.execute("SELECT * FROM Systems WHERE Type = 'Fluxcapacitor'"):
                for sens_row in c.execute("SELECT * FROM Sensors WHERE Type = 'Pressure'"):
                    if sys_row[2] == plant_row[0] and sens_row[2] == sys_row[0]:
                        sensor = sens_row[0]
        value = factory.get_sensor_value('PlantZero', 'Fluxcapacitor', 'Pressure')
        c.execute("INSERT INTO SensorValues VALUES (" + str(time.time()) + "," + str(sensor) + "," + str(value) + ")")
        sensor=0
        for plant_row in c.execute("SELECT * FROM Plants WHERE Name = 'PlantOne' "):
            for sys_row in c.execute("SELECT * FROM Systems WHERE Type = 'Turbine'"):
                for sens_row in c.execute("SELECT * FROM Sensors WHERE Type = 'Humidity'"):
                    if sys_row[2] == plant_row[0] and sens_row[2] == sys_row[0]:
                        sensor = sens_row[0]
        value = factory.get_sensor_value('PlantOne', 'Turbine', 'Humidity')
        c.execute("INSERT INTO SensorValues VALUES (" + str(time.time()) + "," + str(sensor) + "," + str(value) + ")")
        sensor=0
        for plant_row in c.execute("SELECT * FROM Plants WHERE Name = 'PlantOne' "):
            for sys_row in c.execute("SELECT * FROM Systems WHERE Type = 'Turbine'"):
                for sens_row in c.execute("SELECT * FROM Sensors WHERE Type = 'Temperature'"):
                    if sys_row[2] == plant_row[0] and sens_row[2] == sys_row[0]:
                        sensor = sens_row[0]
        value = factory.get_sensor_value('PlantOne', 'Turbine', 'Temperature')
        c.execute("INSERT INTO SensorValues VALUES (" + str(time.time()) + "," + str(sensor) + "," + str(value) + ")")
        sensor=0
        for plant_row in c.execute("SELECT * FROM Plants WHERE Name = 'PlantOne' "):
            for sys_row in c.execute("SELECT * FROM Systems WHERE Type = 'Turbine'"):
                for sens_row in c.execute("SELECT * FROM Sensors WHERE Type = 'Pressure'"):
                    if sys_row[2] == plant_row[0] and sens_row[2] == sys_row[0]:
                        sensor = sens_row[0]
        value = factory.get_sensor_value('PlantOne', 'Turbine', 'Pressure')
        c.execute("INSERT INTO SensorValues VALUES (" + str(time.time()) + "," + str(sensor) + "," + str(value) + ")")
        sensor=0
        for plant_row in c.execute("SELECT * FROM Plants WHERE Name = 'PlantOne' "):
            for sys_row in c.execute("SELECT * FROM Systems WHERE Type = 'Teslacoil'"):
                for sens_row in c.execute("SELECT * FROM Sensors WHERE Type = 'Humidity'"):
                    if sys_row[2] == plant_row[0] and sens_row[2] == sys_row[0]:
                        sensor = sens_row[0]
        value = factory.get_sensor_value('PlantOne', 'Teslacoil', 'Humidity')
        c.execute("INSERT INTO SensorValues VALUES (" + str(time.time()) + "," + str(sensor) + "," + str(value) + ")")
        sensor=0
        for plant_row in c.execute("SELECT * FROM Plants WHERE Name = 'PlantOne' "):
            for sys_row in c.execute("SELECT * FROM Systems WHERE Type = 'Teslacoil'"):
                for sens_row in c.execute("SELECT * FROM Sensors WHERE Type = 'Temperature'"):
                    if sys_row[2] == plant_row[0] and sens_row[2] == sys_row[0]:
                        sensor = sens_row[0]
        value = factory.get_sensor_value('PlantOne', 'Teslacoil', 'Temperature')
        c.execute("INSERT INTO SensorValues VALUES (" + str(time.time()) + "," + str(sensor) + "," + str(value) + ")")
        sensor=0
        for plant_row in c.execute("SELECT * FROM Plants WHERE Name = 'PlantOne' "):
            for sys_row in c.execute("SELECT * FROM Systems WHERE Type = 'Teslacoil'"):
                for sens_row in c.execute("SELECT * FROM Sensors WHERE Type = 'Pressure'"):
                    if sys_row[2] == plant_row[0] and sens_row[2] == sys_row[0]:
                        sensor = sens_row[0]
        value = factory.get_sensor_value('PlantOne', 'Teslacoil', 'Pressure')
        c.execute("INSERT INTO SensorValues VALUES (" + str(time.time()) + "," + str(sensor) + "," + str(value) + ")")
        sensor=0
        for plant_row in c.execute("SELECT * FROM Plants WHERE Name = 'PlantOne' "):
            for sys_row in c.execute("SELECT * FROM Systems WHERE Type = 'Fluxcapacitor'"):
                for sens_row in c.execute("SELECT * FROM Sensors WHERE Type = 'Humidity'"):
                    if sys_row[2] == plant_row[0] and sens_row[2] == sys_row[0]:
                        sensor = sens_row[0]
        value = factory.get_sensor_value('PlantOne', 'Fluxcapacitor', 'Humidity')
        c.execute("INSERT INTO SensorValues VALUES (" + str(time.time()) + "," + str(sensor) + "," + str(value) + ")")
        sensor=0
        for plant_row in c.execute("SELECT * FROM Plants WHERE Name = 'PlantOne' "):
            for sys_row in c.execute("SELECT * FROM Systems WHERE Type = 'Fluxcapacitor'"):
                for sens_row in c.execute("SELECT * FROM Sensors WHERE Type = 'Temperature'"):
                    if sys_row[2] == plant_row[0] and sens_row[2] == sys_row[0]:
                        sensor = sens_row[0]
        value = factory.get_sensor_value('PlantOne', 'Fluxcapacitor', 'Temperature')
        c.execute("INSERT INTO SensorValues VALUES (" + str(time.time()) + "," + str(sensor) + "," + str(value) + ")")
        sensor=0
        for plant_row in c.execute("SELECT * FROM Plants WHERE Name = 'PlantOne' "):
            for sys_row in c.execute("SELECT * FROM Systems WHERE Type = 'Fluxcapacitor'"):
                for sens_row in c.execute("SELECT * FROM Sensors WHERE Type = 'Pressure'"):
                    if sys_row[2] == plant_row[0] and sens_row[2] == sys_row[0]:
                        sensor = sens_row[0]
        value = factory.get_sensor_value('PlantOne', 'Fluxcapacitor', 'Pressure')
        c.execute("INSERT INTO SensorValues VALUES (" + str(time.time()) + "," + str(sensor) + "," + str(value) + ")")
        sensor=0
        for plant_row in c.execute("SELECT * FROM Plants WHERE Name = 'PlantTwo' "):
            for sys_row in c.execute("SELECT * FROM Systems WHERE Type = 'Turbine'"):
                for sens_row in c.execute("SELECT * FROM Sensors WHERE Type = 'Humidity'"):
                    if sys_row[2] == plant_row[0] and sens_row[2] == sys_row[0]:
                        sensor = sens_row[0]
        value = factory.get_sensor_value('PlantTwo', 'Turbine', 'Humidity')
        c.execute("INSERT INTO SensorValues VALUES (" + str(time.time()) + "," + str(sensor) + "," + str(value) + ")")
        sensor=0
        for plant_row in c.execute("SELECT * FROM Plants WHERE Name = 'PlantTwo' "):
            for sys_row in c.execute("SELECT * FROM Systems WHERE Type = 'Turbine'"):
                for sens_row in c.execute("SELECT * FROM Sensors WHERE Type = 'Temperature'"):
                    if sys_row[2] == plant_row[0] and sens_row[2] == sys_row[0]:
                        sensor = sens_row[0]
        value = factory.get_sensor_value('PlantTwo', 'Turbine', 'Temperature')
        c.execute("INSERT INTO SensorValues VALUES (" + str(time.time()) + "," + str(sensor) + "," + str(value) + ")")
        sensor=0
        for plant_row in c.execute("SELECT * FROM Plants WHERE Name = 'PlantTwo' "):
            for sys_row in c.execute("SELECT * FROM Systems WHERE Type = 'Turbine'"):
                for sens_row in c.execute("SELECT * FROM Sensors WHERE Type = 'Pressure'"):
                    if sys_row[2] == plant_row[0] and sens_row[2] == sys_row[0]:
                        sensor = sens_row[0]
        value = factory.get_sensor_value('PlantTwo', 'Turbine', 'Pressure')
        c.execute("INSERT INTO SensorValues VALUES (" + str(time.time()) + "," + str(sensor) + "," + str(value) + ")")
        sensor=0
        for plant_row in c.execute("SELECT * FROM Plants WHERE Name = 'PlantTwo' "):
            for sys_row in c.execute("SELECT * FROM Systems WHERE Type = 'Teslacoil'"):
                for sens_row in c.execute("SELECT * FROM Sensors WHERE Type = 'Humidity'"):
                    if sys_row[2] == plant_row[0] and sens_row[2] == sys_row[0]:
                        sensor = sens_row[0]
        value = factory.get_sensor_value('PlantTwo', 'Teslacoil', 'Humidity')
        c.execute("INSERT INTO SensorValues VALUES (" + str(time.time()) + "," + str(sensor) + "," + str(value) + ")")
        sensor=0
        for plant_row in c.execute("SELECT * FROM Plants WHERE Name = 'PlantTwo' "):
            for sys_row in c.execute("SELECT * FROM Systems WHERE Type = 'Teslacoil'"):
                for sens_row in c.execute("SELECT * FROM Sensors WHERE Type = 'Temperature'"):
                    if sys_row[2] == plant_row[0] and sens_row[2] == sys_row[0]:
                        sensor = sens_row[0]
        value = factory.get_sensor_value('PlantTwo', 'Teslacoil', 'Temperature')
        c.execute("INSERT INTO SensorValues VALUES (" + str(time.time()) + "," + str(sensor) + "," + str(value) + ")")
        sensor=0
        for plant_row in c.execute("SELECT * FROM Plants WHERE Name = 'PlantTwo' "):
            for sys_row in c.execute("SELECT * FROM Systems WHERE Type = 'Teslacoil'"):
                for sens_row in c.execute("SELECT * FROM Sensors WHERE Type = 'Pressure'"):
                    if sys_row[2] == plant_row[0] and sens_row[2] == sys_row[0]:
                        sensor = sens_row[0]
        value = factory.get_sensor_value('PlantTwo', 'Teslacoil', 'Pressure')
        c.execute("INSERT INTO SensorValues VALUES (" + str(time.time()) + "," + str(sensor) + "," + str(value) + ")")
        sensor=0
        for plant_row in c.execute("SELECT * FROM Plants WHERE Name = 'PlantTwo' "):
            for sys_row in c.execute("SELECT * FROM Systems WHERE Type = 'Fluxcapacitor'"):
                for sens_row in c.execute("SELECT * FROM Sensors WHERE Type = 'Humidity'"):
                    if sys_row[2] == plant_row[0] and sens_row[2] == sys_row[0]:
                        sensor = sens_row[0]
        value = factory.get_sensor_value('PlantTwo', 'Fluxcapacitor', 'Humidity')
        c.execute("INSERT INTO SensorValues VALUES (" + str(time.time()) + "," + str(sensor) + "," + str(value) + ")")
        sensor=0
        for plant_row in c.execute("SELECT * FROM Plants WHERE Name = 'PlantTwo' "):
            for sys_row in c.execute("SELECT * FROM Systems WHERE Type = 'Fluxcapacitor'"):
                for sens_row in c.execute("SELECT * FROM Sensors WHERE Type = 'Temperature'"):
                    if sys_row[2] == plant_row[0] and sens_row[2] == sys_row[0]:
                        sensor = sens_row[0]
        value = factory.get_sensor_value('PlantTwo', 'Fluxcapacitor', 'Temperature')
        c.execute("INSERT INTO SensorValues VALUES (" + str(time.time()) + "," + str(sensor) + "," + str(value) + ")")
        sensor=0
        for plant_row in c.execute("SELECT * FROM Plants WHERE Name = 'PlantTwo' "):
            for sys_row in c.execute("SELECT * FROM Systems WHERE Type = 'Fluxcapacitor'"):
                for sens_row in c.execute("SELECT * FROM Sensors WHERE Type = 'Pressure'"):
                    if sys_row[2] == plant_row[0] and sens_row[2] == sys_row[0]:
                        sensor = sens_row[0]
        value = factory.get_sensor_value('PlantTwo', 'Fluxcapacitor', 'Pressure')
        c.execute("INSERT INTO SensorValues VALUES (" + str(time.time()) + "," + str(sensor) + "," + str(value) + ")")
        sensor=0
        for plant_row in c.execute("SELECT * FROM Plants WHERE Name = 'PlantThree' "):
            for sys_row in c.execute("SELECT * FROM Systems WHERE Type = 'Turbine'"):
                for sens_row in c.execute("SELECT * FROM Sensors WHERE Type = 'Humidity'"):
                    if sys_row[2] == plant_row[0] and sens_row[2] == sys_row[0]:
                        sensor = sens_row[0]
        value = factory.get_sensor_value('PlantThree', 'Turbine', 'Humidity')
        c.execute("INSERT INTO SensorValues VALUES (" + str(time.time()) + "," + str(sensor) + "," + str(value) + ")")
        sensor=0
        for plant_row in c.execute("SELECT * FROM Plants WHERE Name = 'PlantThree' "):
            for sys_row in c.execute("SELECT * FROM Systems WHERE Type = 'Turbine'"):
                for sens_row in c.execute("SELECT * FROM Sensors WHERE Type = 'Temperature'"):
                    if sys_row[2] == plant_row[0] and sens_row[2] == sys_row[0]:
                        sensor = sens_row[0]
        value = factory.get_sensor_value('PlantThree', 'Turbine', 'Temperature')
        c.execute("INSERT INTO SensorValues VALUES (" + str(time.time()) + "," + str(sensor) + "," + str(value) + ")")
        sensor=0
        for plant_row in c.execute("SELECT * FROM Plants WHERE Name = 'PlantThree' "):
            for sys_row in c.execute("SELECT * FROM Systems WHERE Type = 'Turbine'"):
                for sens_row in c.execute("SELECT * FROM Sensors WHERE Type = 'Pressure'"):
                    if sys_row[2] == plant_row[0] and sens_row[2] == sys_row[0]:
                        sensor = sens_row[0]
        value = factory.get_sensor_value('PlantThree', 'Turbine', 'Pressure')
        c.execute("INSERT INTO SensorValues VALUES (" + str(time.time()) + "," + str(sensor) + "," + str(value) + ")")
        sensor=0
        for plant_row in c.execute("SELECT * FROM Plants WHERE Name = 'PlantThree' "):
            for sys_row in c.execute("SELECT * FROM Systems WHERE Type = 'Teslacoil'"):
                for sens_row in c.execute("SELECT * FROM Sensors WHERE Type = 'Humidity'"):
                    if sys_row[2] == plant_row[0] and sens_row[2] == sys_row[0]:
                        sensor = sens_row[0]
        value = factory.get_sensor_value('PlantThree', 'Teslacoil', 'Humidity')
        c.execute("INSERT INTO SensorValues VALUES (" + str(time.time()) + "," + str(sensor) + "," + str(value) + ")")
        sensor=0
        for plant_row in c.execute("SELECT * FROM Plants WHERE Name = 'PlantThree' "):
            for sys_row in c.execute("SELECT * FROM Systems WHERE Type = 'Teslacoil'"):
                for sens_row in c.execute("SELECT * FROM Sensors WHERE Type = 'Temperature'"):
                    if sys_row[2] == plant_row[0] and sens_row[2] == sys_row[0]:
                        sensor = sens_row[0]
        value = factory.get_sensor_value('PlantThree', 'Teslacoil', 'Temperature')
        c.execute("INSERT INTO SensorValues VALUES (" + str(time.time()) + "," + str(sensor) + "," + str(value) + ")")
        sensor=0
        for plant_row in c.execute("SELECT * FROM Plants WHERE Name = 'PlantThree' "):
            for sys_row in c.execute("SELECT * FROM Systems WHERE Type = 'Teslacoil'"):
                for sens_row in c.execute("SELECT * FROM Sensors WHERE Type = 'Pressure'"):
                    if sys_row[2] == plant_row[0] and sens_row[2] == sys_row[0]:
                        sensor = sens_row[0]
        value = factory.get_sensor_value('PlantThree', 'Teslacoil', 'Pressure')
        c.execute("INSERT INTO SensorValues VALUES (" + str(time.time()) + "," + str(sensor) + "," + str(value) + ")")
        sensor=0
        for plant_row in c.execute("SELECT * FROM Plants WHERE Name = 'PlantThree' "):
            for sys_row in c.execute("SELECT * FROM Systems WHERE Type = 'Fluxcapacitor'"):
                for sens_row in c.execute("SELECT * FROM Sensors WHERE Type = 'Humidity'"):
                    if sys_row[2] == plant_row[0] and sens_row[2] == sys_row[0]:
                        sensor = sens_row[0]
        value = factory.get_sensor_value('PlantThree', 'Fluxcapacitor', 'Humidity')
        c.execute("INSERT INTO SensorValues VALUES (" + str(time.time()) + "," + str(sensor) + "," + str(value) + ")")
        sensor=0
        for plant_row in c.execute("SELECT * FROM Plants WHERE Name = 'PlantThree' "):
            for sys_row in c.execute("SELECT * FROM Systems WHERE Type = 'Fluxcapacitor'"):
                for sens_row in c.execute("SELECT * FROM Sensors WHERE Type = 'Temperature'"):
                    if sys_row[2] == plant_row[0] and sens_row[2] == sys_row[0]:
                        sensor = sens_row[0]
        value = factory.get_sensor_value('PlantThree', 'Fluxcapacitor', 'Temperature')
        c.execute("INSERT INTO SensorValues VALUES (" + str(time.time()) + "," + str(sensor) + "," + str(value) + ")")
        sensor=0
        for plant_row in c.execute("SELECT * FROM Plants WHERE Name = 'PlantThree' "):
            for sys_row in c.execute("SELECT * FROM Systems WHERE Type = 'Fluxcapacitor'"):
                for sens_row in c.execute("SELECT * FROM Sensors WHERE Type = 'Pressure'"):
                    if sys_row[2] == plant_row[0] and sens_row[2] == sys_row[0]:
                        sensor = sens_row[0]
        value = factory.get_sensor_value('PlantThree', 'Fluxcapacitor', 'Pressure')
        c.execute("INSERT INTO SensorValues VALUES (" + str(time.time()) + "," + str(sensor) + "," + str(value) + ")")
        sensor=0
        for plant_row in c.execute("SELECT * FROM Plants WHERE Name = 'PlantFour' "):
            for sys_row in c.execute("SELECT * FROM Systems WHERE Type = 'Turbine'"):
                for sens_row in c.execute("SELECT * FROM Sensors WHERE Type = 'Humidity'"):
                    if sys_row[2] == plant_row[0] and sens_row[2] == sys_row[0]:
                        sensor = sens_row[0]
        value = factory.get_sensor_value('PlantFour', 'Turbine', 'Humidity')
        c.execute("INSERT INTO SensorValues VALUES (" + str(time.time()) + "," + str(sensor) + "," + str(value) + ")")
        sensor=0
        for plant_row in c.execute("SELECT * FROM Plants WHERE Name = 'PlantFour' "):
            for sys_row in c.execute("SELECT * FROM Systems WHERE Type = 'Turbine'"):
                for sens_row in c.execute("SELECT * FROM Sensors WHERE Type = 'Temperature'"):
                    if sys_row[2] == plant_row[0] and sens_row[2] == sys_row[0]:
                        sensor = sens_row[0]
        value = factory.get_sensor_value('PlantFour', 'Turbine', 'Temperature')
        c.execute("INSERT INTO SensorValues VALUES (" + str(time.time()) + "," + str(sensor) + "," + str(value) + ")")
        sensor=0
        for plant_row in c.execute("SELECT * FROM Plants WHERE Name = 'PlantFour' "):
            for sys_row in c.execute("SELECT * FROM Systems WHERE Type = 'Turbine'"):
                for sens_row in c.execute("SELECT * FROM Sensors WHERE Type = 'Pressure'"):
                    if sys_row[2] == plant_row[0] and sens_row[2] == sys_row[0]:
                        sensor = sens_row[0]
        value = factory.get_sensor_value('PlantFour', 'Turbine', 'Pressure')
        c.execute("INSERT INTO SensorValues VALUES (" + str(time.time()) + "," + str(sensor) + "," + str(value) + ")")
        sensor=0
        for plant_row in c.execute("SELECT * FROM Plants WHERE Name = 'PlantFour' "):
            for sys_row in c.execute("SELECT * FROM Systems WHERE Type = 'Teslacoil'"):
                for sens_row in c.execute("SELECT * FROM Sensors WHERE Type = 'Humidity'"):
                    if sys_row[2] == plant_row[0] and sens_row[2] == sys_row[0]:
                        sensor = sens_row[0]
        value = factory.get_sensor_value('PlantFour', 'Teslacoil', 'Humidity')
        c.execute("INSERT INTO SensorValues VALUES (" + str(time.time()) + "," + str(sensor) + "," + str(value) + ")")
        sensor=0
        for plant_row in c.execute("SELECT * FROM Plants WHERE Name = 'PlantFour' "):
            for sys_row in c.execute("SELECT * FROM Systems WHERE Type = 'Teslacoil'"):
                for sens_row in c.execute("SELECT * FROM Sensors WHERE Type = 'Temperature'"):
                    if sys_row[2] == plant_row[0] and sens_row[2] == sys_row[0]:
                        sensor = sens_row[0]
        value = factory.get_sensor_value('PlantFour', 'Teslacoil', 'Temperature')
        c.execute("INSERT INTO SensorValues VALUES (" + str(time.time()) + "," + str(sensor) + "," + str(value) + ")")
        sensor=0
        for plant_row in c.execute("SELECT * FROM Plants WHERE Name = 'PlantFour' "):
            for sys_row in c.execute("SELECT * FROM Systems WHERE Type = 'Teslacoil'"):
                for sens_row in c.execute("SELECT * FROM Sensors WHERE Type = 'Pressure'"):
                    if sys_row[2] == plant_row[0] and sens_row[2] == sys_row[0]:
                        sensor = sens_row[0]
        value = factory.get_sensor_value('PlantFour', 'Teslacoil', 'Pressure')
        c.execute("INSERT INTO SensorValues VALUES (" + str(time.time()) + "," + str(sensor) + "," + str(value) + ")")
        sensor=0
        for plant_row in c.execute("SELECT * FROM Plants WHERE Name = 'PlantFour' "):
            for sys_row in c.execute("SELECT * FROM Systems WHERE Type = 'Fluxcapacitor'"):
                for sens_row in c.execute("SELECT * FROM Sensors WHERE Type = 'Humidity'"):
                    if sys_row[2] == plant_row[0] and sens_row[2] == sys_row[0]:
                        sensor = sens_row[0]
        value = factory.get_sensor_value('PlantFour', 'Fluxcapacitor', 'Humidity')
        c.execute("INSERT INTO SensorValues VALUES (" + str(time.time()) + "," + str(sensor) + "," + str(value) + ")")
        sensor=0
        for plant_row in c.execute("SELECT * FROM Plants WHERE Name = 'PlantFour' "):
            for sys_row in c.execute("SELECT * FROM Systems WHERE Type = 'Fluxcapacitor'"):
                for sens_row in c.execute("SELECT * FROM Sensors WHERE Type = 'Temperature'"):
                    if sys_row[2] == plant_row[0] and sens_row[2] == sys_row[0]:
                        sensor = sens_row[0]
        value = factory.get_sensor_value('PlantFour', 'Fluxcapacitor', 'Temperature')
        c.execute("INSERT INTO SensorValues VALUES (" + str(time.time()) + "," + str(sensor) + "," + str(value) + ")")
        sensor=0
        for plant_row in c.execute("SELECT * FROM Plants WHERE Name = 'PlantFour' "):
            for sys_row in c.execute("SELECT * FROM Systems WHERE Type = 'Fluxcapacitor'"):
                for sens_row in c.execute("SELECT * FROM Sensors WHERE Type = 'Pressure'"):
                    if sys_row[2] == plant_row[0] and sens_row[2] == sys_row[0]:
                        sensor = sens_row[0]
        value = factory.get_sensor_value('PlantFour', 'Fluxcapacitor', 'Pressure')
        c.execute("INSERT INTO SensorValues VALUES (" + str(time.time()) + "," + str(sensor) + "," + str(value) + ")")
