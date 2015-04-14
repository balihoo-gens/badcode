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
        for row in c.execute("SELECT * FROM Plants"):
            plant = row[0]
        system = -1
        for row in c.execute("SELECT * FROM Systems"):
            if row[2] == plant:
                system = row[0]
        sensor = -1
        for row in c.execute("SELECT * FROM Sensors"):
            if row[2] == system:
                sensor = row[0]
        value = factory.get_sensor_value('PlantZero', 'Turbine', 'Humidity')
        c.execute("INSERT INTO SensorValues VALUES (" + str(time.time()) + "," + str(sensor) + "," + str(value) + ")")
        for row in c.execute("SELECT * FROM Plants"):
            if row[1] == 'PlantZero':
                plant = row[0]
        for row in c.execute("SELECT * FROM Systems"):
            if row[2] == plant and row[1] == "Turbine":
                system = row[0]
        for row in c.execute("SELECT * FROM Sensors"):
            if row[2] == system and row[1] == "Temperature":
                sensor = row[0]
        value = factory.get_sensor_value('PlantZero', 'Turbine', 'Temperature')
        c.execute("INSERT INTO SensorValues VALUES (" + str(time.time()) + "," + str(sensor) + "," + str(value) + ")")
        for row in c.execute("SELECT * FROM Plants"):
            if row[1] == 'PlantZero':
                plant = row[0]
        for row in c.execute("SELECT * FROM Systems"):
            if row[2] == plant and row[1] == "Turbine":
                system = row[0]
        for row in c.execute("SELECT * FROM Sensors"):
            if row[2] == system and row[1] == "Pressure":
                sensor = row[0]
        value = factory.get_sensor_value('PlantZero', 'Turbine', 'Pressure')
        c.execute("INSERT INTO SensorValues VALUES (" + str(time.time()) + "," + str(sensor) + "," + str(value) + ")")
        for row in c.execute("SELECT * FROM Plants"):
            if row[1] == 'PlantZero':
                plant = row[0]
        for row in c.execute("SELECT * FROM Systems"):
            if row[2] == plant and row[1] == "Teslacoil":
                system = row[0]
        for row in c.execute("SELECT * FROM Sensors"):
            if row[2] == system and row[1] == "Humidity":
                sensor = row[0]
        value = factory.get_sensor_value('PlantZero', 'Teslacoil', 'Humidity')
        c.execute("INSERT INTO SensorValues VALUES (" + str(time.time()) + "," + str(sensor) + "," + str(value) + ")")
        for row in c.execute("SELECT * FROM Plants"):
            if row[1] == 'PlantZero':
                plant = row[0]
        for row in c.execute("SELECT * FROM Systems"):
            if row[2] == plant and row[1] == "Teslacoil":
                system = row[0]
        for row in c.execute("SELECT * FROM Sensors"):
            if row[2] == system and row[1] == "Temperature":
                sensor = row[0]
        value = factory.get_sensor_value('PlantZero', 'Teslacoil', 'Temperature')
        c.execute("INSERT INTO SensorValues VALUES (" + str(time.time()) + "," + str(sensor) + "," + str(value) + ")")
        for row in c.execute("SELECT * FROM Plants"):
            if row[1] == 'PlantZero':
                plant = row[0]
        for row in c.execute("SELECT * FROM Systems"):
            if row[2] == plant and row[1] == "Teslacoil":
                system = row[0]
        for row in c.execute("SELECT * FROM Sensors"):
            if row[2] == system and row[1] == "Pressure":
                sensor = row[0]
        value = factory.get_sensor_value('PlantZero', 'Teslacoil', 'Pressure')
        c.execute("INSERT INTO SensorValues VALUES (" + str(time.time()) + "," + str(sensor) + "," + str(value) + ")")
        for row in c.execute("SELECT * FROM Plants"):
            if row[1] == 'PlantZero':
                plant = row[0]
        for row in c.execute("SELECT * FROM Systems"):
            if row[2] == plant and row[1] == "Fluxcapacitor":
                system = row[0]
        for row in c.execute("SELECT * FROM Sensors"):
            if row[2] == system and row[1] == "Humidity":
                sensor = row[0]
        value = factory.get_sensor_value('PlantZero', 'Fluxcapacitor', 'Humidity')
        c.execute("INSERT INTO SensorValues VALUES (" + str(time.time()) + "," + str(sensor) + "," + str(value) + ")")
        for row in c.execute("SELECT * FROM Plants"):
            if row[1] == 'PlantZero':
                plant = row[0]
        for row in c.execute("SELECT * FROM Systems"):
            if row[2] == plant and row[1] == "Fluxcapacitor":
                system = row[0]
        for row in c.execute("SELECT * FROM Sensors"):
            if row[2] == system and row[1] == "Temperature":
                sensor = row[0]
        value = factory.get_sensor_value('PlantZero', 'Fluxcapacitor', 'Temperature')
        c.execute("INSERT INTO SensorValues VALUES (" + str(time.time()) + "," + str(sensor) + "," + str(value) + ")")
        for row in c.execute("SELECT * FROM Plants"):
            if row[1] == 'PlantZero':
                plant = row[0]
        for row in c.execute("SELECT * FROM Systems"):
            if row[2] == plant and row[1] == "Fluxcapacitor":
                system = row[0]
        for row in c.execute("SELECT * FROM Sensors"):
            if row[2] == system and row[1] == "Pressure":
                sensor = row[0]
        value = factory.get_sensor_value('PlantZero', 'Fluxcapacitor', 'Pressure')
        c.execute("INSERT INTO SensorValues VALUES (" + str(time.time()) + "," + str(sensor) + "," + str(value) + ")")
        for row in c.execute("SELECT * FROM Plants"):
            if row[1] == 'PlantOne':
                plant = row[0]
        for row in c.execute("SELECT * FROM Systems"):
            if row[2] == plant and row[1] == "Turbine":
                system = row[0]
        for row in c.execute("SELECT * FROM Sensors"):
            if row[2] == system and row[1] == "Humidity":
                sensor = row[0]
        value = factory.get_sensor_value('PlantOne', 'Turbine', 'Humidity')
        c.execute("INSERT INTO SensorValues VALUES (" + str(time.time()) + "," + str(sensor) + "," + str(value) + ")")
        for row in c.execute("SELECT * FROM Plants"):
            if row[1] == 'PlantOne':
                plant = row[0]
        for row in c.execute("SELECT * FROM Systems"):
            if row[2] == plant and row[1] == "Turbine":
                system = row[0]
        for row in c.execute("SELECT * FROM Sensors"):
            if row[2] == system and row[1] == "Temperature":
                sensor = row[0]
        value = factory.get_sensor_value('PlantOne', 'Turbine', 'Temperature')
        c.execute("INSERT INTO SensorValues VALUES (" + str(time.time()) + "," + str(sensor) + "," + str(value) + ")")
        for row in c.execute("SELECT * FROM Plants"):
            if row[1] == 'PlantOne':
                plant = row[0]
        for row in c.execute("SELECT * FROM Systems"):
            if row[2] == plant and row[1] == "Turbine":
                system = row[0]
        for row in c.execute("SELECT * FROM Sensors"):
            if row[2] == system and row[1] == "Pressure":
                sensor = row[0]
        value = factory.get_sensor_value('PlantOne', 'Turbine', 'Pressure')
        c.execute("INSERT INTO SensorValues VALUES (" + str(time.time()) + "," + str(sensor) + "," + str(value) + ")")
        for row in c.execute("SELECT * FROM Plants"):
            if row[1] == 'PlantOne':
                plant = row[0]
        for row in c.execute("SELECT * FROM Systems"):
            if row[2] == plant and row[1] == "Teslacoil":
                system = row[0]
        for row in c.execute("SELECT * FROM Sensors"):
            if row[2] == system and row[1] == "Humidity":
                sensor = row[0]
        value = factory.get_sensor_value('PlantOne', 'Teslacoil', 'Humidity')
        c.execute("INSERT INTO SensorValues VALUES (" + str(time.time()) + "," + str(sensor) + "," + str(value) + ")")
        for row in c.execute("SELECT * FROM Plants"):
            if row[1] == 'PlantOne':
                plant = row[0]
        for row in c.execute("SELECT * FROM Systems"):
            if row[2] == plant and row[1] == "Teslacoil":
                system = row[0]
        for row in c.execute("SELECT * FROM Sensors"):
            if row[2] == system and row[1] == "Temperature":
                sensor = row[0]
        value = factory.get_sensor_value('PlantOne', 'Teslacoil', 'Temperature')
        c.execute("INSERT INTO SensorValues VALUES (" + str(time.time()) + "," + str(sensor) + "," + str(value) + ")")
        for row in c.execute("SELECT * FROM Plants"):
            if row[1] == 'PlantOne':
                plant = row[0]
        for row in c.execute("SELECT * FROM Systems"):
            if row[2] == plant and row[1] == "Teslacoil":
                system = row[0]
        for row in c.execute("SELECT * FROM Sensors"):
            if row[2] == system and row[1] == "Pressure":
                sensor = row[0]
        value = factory.get_sensor_value('PlantOne', 'Teslacoil', 'Pressure')
        c.execute("INSERT INTO SensorValues VALUES (" + str(time.time()) + "," + str(sensor) + "," + str(value) + ")")
        for row in c.execute("SELECT * FROM Plants"):
            if row[1] == 'PlantOne':
                plant = row[0]
        for row in c.execute("SELECT * FROM Systems"):
            if row[2] == plant and row[1] == "Fluxcapacitor":
                system = row[0]
        for row in c.execute("SELECT * FROM Sensors"):
            if row[2] == system and row[1] == "Humidity":
                sensor = row[0]
        value = factory.get_sensor_value('PlantOne', 'Fluxcapacitor', 'Humidity')
        c.execute("INSERT INTO SensorValues VALUES (" + str(time.time()) + "," + str(sensor) + "," + str(value) + ")")
        for row in c.execute("SELECT * FROM Plants"):
            if row[1] == 'PlantOne':
                plant = row[0]
        for row in c.execute("SELECT * FROM Systems"):
            if row[2] == plant and row[1] == "Fluxcapacitor":
                system = row[0]
        for row in c.execute("SELECT * FROM Sensors"):
            if row[2] == system and row[1] == "Temperature":
                sensor = row[0]
        value = factory.get_sensor_value('PlantOne', 'Fluxcapacitor', 'Temperature')
        c.execute("INSERT INTO SensorValues VALUES (" + str(time.time()) + "," + str(sensor) + "," + str(value) + ")")
        for row in c.execute("SELECT * FROM Plants"):
            if row[1] == 'PlantOne':
                plant = row[0]
        for row in c.execute("SELECT * FROM Systems"):
            if row[2] == plant and row[1] == "Fluxcapacitor":
                system = row[0]
        for row in c.execute("SELECT * FROM Sensors"):
            if row[2] == system and row[1] == "Pressure":
                sensor = row[0]
        value = factory.get_sensor_value('PlantOne', 'Fluxcapacitor', 'Pressure')
        c.execute("INSERT INTO SensorValues VALUES (" + str(time.time()) + "," + str(sensor) + "," + str(value) + ")")
        for row in c.execute("SELECT * FROM Plants"):
            if row[1] == 'PlantTwo':
                plant = row[0]
        for row in c.execute("SELECT * FROM Systems"):
            if row[2] == plant and row[1] == "Turbine":
                system = row[0]
        for row in c.execute("SELECT * FROM Sensors"):
            if row[2] == system and row[1] == "Humidity":
                sensor = row[0]
        value = factory.get_sensor_value('PlantTwo', 'Turbine', 'Humidity')
        c.execute("INSERT INTO SensorValues VALUES (" + str(time.time()) + "," + str(sensor) + "," + str(value) + ")")
        for row in c.execute("SELECT * FROM Plants"):
            if row[1] == 'PlantTwo':
                plant = row[0]
        for row in c.execute("SELECT * FROM Systems"):
            if row[2] == plant and row[1] == "Turbine":
                system = row[0]
        for row in c.execute("SELECT * FROM Sensors"):
            if row[2] == system and row[1] == "Temperature":
                sensor = row[0]
        value = factory.get_sensor_value('PlantTwo', 'Turbine', 'Temperature')
        c.execute("INSERT INTO SensorValues VALUES (" + str(time.time()) + "," + str(sensor) + "," + str(value) + ")")
        for row in c.execute("SELECT * FROM Plants"):
            if row[1] == 'PlantTwo':
                plant = row[0]
        for row in c.execute("SELECT * FROM Systems"):
            if row[2] == plant and row[1] == "Turbine":
                system = row[0]
        for row in c.execute("SELECT * FROM Sensors"):
            if row[2] == system and row[1] == "Pressure":
                sensor = row[0]
        value = factory.get_sensor_value('PlantTwo', 'Turbine', 'Pressure')
        c.execute("INSERT INTO SensorValues VALUES (" + str(time.time()) + "," + str(sensor) + "," + str(value) + ")")
        for row in c.execute("SELECT * FROM Plants"):
            if row[1] == 'PlantTwo':
                plant = row[0]
        for row in c.execute("SELECT * FROM Systems"):
            if row[2] == plant and row[1] == "Teslacoil":
                system = row[0]
        for row in c.execute("SELECT * FROM Sensors"):
            if row[2] == system and row[1] == "Humidity":
                sensor = row[0]
        value = factory.get_sensor_value('PlantTwo', 'Teslacoil', 'Humidity')
        c.execute("INSERT INTO SensorValues VALUES (" + str(time.time()) + "," + str(sensor) + "," + str(value) + ")")
        for row in c.execute("SELECT * FROM Plants"):
            if row[1] == 'PlantTwo':
                plant = row[0]
        for row in c.execute("SELECT * FROM Systems"):
            if row[2] == plant and row[1] == "Teslacoil":
                system = row[0]
        for row in c.execute("SELECT * FROM Sensors"):
            if row[2] == system and row[1] == "Temperature":
                sensor = row[0]
        value = factory.get_sensor_value('PlantTwo', 'Teslacoil', 'Temperature')
        c.execute("INSERT INTO SensorValues VALUES (" + str(time.time()) + "," + str(sensor) + "," + str(value) + ")")
        for row in c.execute("SELECT * FROM Plants"):
            if row[1] == 'PlantTwo':
                plant = row[0]
        for row in c.execute("SELECT * FROM Systems"):
            if row[2] == plant and row[1] == "Teslacoil":
                system = row[0]
        for row in c.execute("SELECT * FROM Sensors"):
            if row[2] == system and row[1] == "Pressure":
                sensor = row[0]
        value = factory.get_sensor_value('PlantTwo', 'Teslacoil', 'Pressure')
        c.execute("INSERT INTO SensorValues VALUES (" + str(time.time()) + "," + str(sensor) + "," + str(value) + ")")
        for row in c.execute("SELECT * FROM Plants"):
            if row[1] == 'PlantTwo':
                plant = row[0]
        for row in c.execute("SELECT * FROM Systems"):
            if row[2] == plant and row[1] == "Fluxcapacitor":
                system = row[0]
        for row in c.execute("SELECT * FROM Sensors"):
            if row[2] == system and row[1] == "Humidity":
                sensor = row[0]
        value = factory.get_sensor_value('PlantTwo', 'Fluxcapacitor', 'Humidity')
        c.execute("INSERT INTO SensorValues VALUES (" + str(time.time()) + "," + str(sensor) + "," + str(value) + ")")
        for row in c.execute("SELECT * FROM Plants"):
            if row[1] == 'PlantTwo':
                plant = row[0]
        for row in c.execute("SELECT * FROM Systems"):
            if row[2] == plant and row[1] == "Fluxcapacitor":
                system = row[0]
        for row in c.execute("SELECT * FROM Sensors"):
            if row[2] == system and row[1] == "Temperature":
                sensor = row[0]
        value = factory.get_sensor_value('PlantTwo', 'Fluxcapacitor', 'Temperature')
        c.execute("INSERT INTO SensorValues VALUES (" + str(time.time()) + "," + str(sensor) + "," + str(value) + ")")
        for row in c.execute("SELECT * FROM Plants"):
            if row[1] == 'PlantTwo':
                plant = row[0]
        for row in c.execute("SELECT * FROM Systems"):
            if row[2] == plant and row[1] == "Fluxcapacitor":
                system = row[0]
        for row in c.execute("SELECT * FROM Sensors"):
            if row[2] == system and row[1] == "Pressure":
                sensor = row[0]
        value = factory.get_sensor_value('PlantTwo', 'Fluxcapacitor', 'Pressure')
        c.execute("INSERT INTO SensorValues VALUES (" + str(time.time()) + "," + str(sensor) + "," + str(value) + ")")
        for row in c.execute("SELECT * FROM Plants"):
            if row[1] == 'PlantThree':
                plant = row[0]
        for row in c.execute("SELECT * FROM Systems"):
            if row[2] == plant and row[1] == "Turbine":
                system = row[0]
        for row in c.execute("SELECT * FROM Sensors"):
            if row[2] == system and row[1] == "Humidity":
                sensor = row[0]
        value = factory.get_sensor_value('PlantThree', 'Turbine', 'Humidity')
        c.execute("INSERT INTO SensorValues VALUES (" + str(time.time()) + "," + str(sensor) + "," + str(value) + ")")
        for row in c.execute("SELECT * FROM Plants"):
            if row[1] == 'PlantThree':
                plant = row[0]
        for row in c.execute("SELECT * FROM Systems"):
            if row[2] == plant and row[1] == "Turbine":
                system = row[0]
        for row in c.execute("SELECT * FROM Sensors"):
            if row[2] == system and row[1] == "Temperature":
                sensor = row[0]
        value = factory.get_sensor_value('PlantThree', 'Turbine', 'Temperature')
        c.execute("INSERT INTO SensorValues VALUES (" + str(time.time()) + "," + str(sensor) + "," + str(value) + ")")
        for row in c.execute("SELECT * FROM Plants"):
            if row[1] == 'PlantThree':
                plant = row[0]
        for row in c.execute("SELECT * FROM Systems"):
            if row[2] == plant and row[1] == "Turbine":
                system = row[0]
        for row in c.execute("SELECT * FROM Sensors"):
            if row[2] == system and row[1] == "Pressure":
                sensor = row[0]
        value = factory.get_sensor_value('PlantThree', 'Turbine', 'Pressure')
        c.execute("INSERT INTO SensorValues VALUES (" + str(time.time()) + "," + str(sensor) + "," + str(value) + ")")
        for row in c.execute("SELECT * FROM Plants"):
            if row[1] == 'PlantThree':
                plant = row[0]
        for row in c.execute("SELECT * FROM Systems"):
            if row[2] == plant and row[1] == "Teslacoil":
                system = row[0]
        for row in c.execute("SELECT * FROM Sensors"):
            if row[2] == system and row[1] == "Humidity":
                sensor = row[0]
        value = factory.get_sensor_value('PlantThree', 'Teslacoil', 'Humidity')
        c.execute("INSERT INTO SensorValues VALUES (" + str(time.time()) + "," + str(sensor) + "," + str(value) + ")")
        for row in c.execute("SELECT * FROM Plants"):
            if row[1] == 'PlantThree':
                plant = row[0]
        for row in c.execute("SELECT * FROM Systems"):
            if row[2] == plant and row[1] == "Teslacoil":
                system = row[0]
        for row in c.execute("SELECT * FROM Sensors"):
            if row[2] == system and row[1] == "Temperature":
                sensor = row[0]
        value = factory.get_sensor_value('PlantThree', 'Teslacoil', 'Temperature')
        c.execute("INSERT INTO SensorValues VALUES (" + str(time.time()) + "," + str(sensor) + "," + str(value) + ")")
        for row in c.execute("SELECT * FROM Plants"):
            if row[1] == 'PlantThree':
                plant = row[0]
        for row in c.execute("SELECT * FROM Systems"):
            if row[2] == plant and row[1] == "Teslacoil":
                system = row[0]
        for row in c.execute("SELECT * FROM Sensors"):
            if row[2] == system and row[1] == "Pressure":
                sensor = row[0]
        value = factory.get_sensor_value('PlantThree', 'Teslacoil', 'Pressure')
        c.execute("INSERT INTO SensorValues VALUES (" + str(time.time()) + "," + str(sensor) + "," + str(value) + ")")
        for row in c.execute("SELECT * FROM Plants"):
            if row[1] == 'PlantThree':
                plant = row[0]
        for row in c.execute("SELECT * FROM Systems"):
            if row[2] == plant and row[1] == "Fluxcapacitor":
                system = row[0]
        for row in c.execute("SELECT * FROM Sensors"):
            if row[2] == system and row[1] == "Humidity":
                sensor = row[0]
        value = factory.get_sensor_value('PlantThree', 'Fluxcapacitor', 'Humidity')
        c.execute("INSERT INTO SensorValues VALUES (" + str(time.time()) + "," + str(sensor) + "," + str(value) + ")")
        for row in c.execute("SELECT * FROM Plants"):
            if row[1] == 'PlantThree':
                plant = row[0]
        for row in c.execute("SELECT * FROM Systems"):
            if row[2] == plant and row[1] == "Fluxcapacitor":
                system = row[0]
        for row in c.execute("SELECT * FROM Sensors"):
            if row[2] == system and row[1] == "Temperature":
                sensor = row[0]
        value = factory.get_sensor_value('PlantThree', 'Fluxcapacitor', 'Temperature')
        c.execute("INSERT INTO SensorValues VALUES (" + str(time.time()) + "," + str(sensor) + "," + str(value) + ")")
        for row in c.execute("SELECT * FROM Plants"):
            if row[1] == 'PlantThree':
                plant = row[0]
        for row in c.execute("SELECT * FROM Systems"):
            if row[2] == plant and row[1] == "Fluxcapacitor":
                system = row[0]
        for row in c.execute("SELECT * FROM Sensors"):
            if row[2] == system and row[1] == "Pressure":
                sensor = row[0]
        value = factory.get_sensor_value('PlantThree', 'Fluxcapacitor', 'Pressure')
        c.execute("INSERT INTO SensorValues VALUES (" + str(time.time()) + "," + str(sensor) + "," + str(value) + ")")
        for row in c.execute("SELECT * FROM Plants"):
            if row[1] == 'PlantFour':
                plant = row[0]
        for row in c.execute("SELECT * FROM Systems"):
            if row[2] == plant and row[1] == "Turbine":
                system = row[0]
        for row in c.execute("SELECT * FROM Sensors"):
            if row[2] == system and row[1] == "Humidity":
                sensor = row[0]
        value = factory.get_sensor_value('PlantFour', 'Turbine', 'Humidity')
        c.execute("INSERT INTO SensorValues VALUES (" + str(time.time()) + "," + str(sensor) + "," + str(value) + ")")
        for row in c.execute("SELECT * FROM Plants"):
            if row[1] == 'PlantFour':
                plant = row[0]
        for row in c.execute("SELECT * FROM Systems"):
            if row[2] == plant and row[1] == "Turbine":
                system = row[0]
        for row in c.execute("SELECT * FROM Sensors"):
            if row[2] == system and row[1] == "Temperature":
                sensor = row[0]
        value = factory.get_sensor_value('PlantFour', 'Turbine', 'Temperature')
        c.execute("INSERT INTO SensorValues VALUES (" + str(time.time()) + "," + str(sensor) + "," + str(value) + ")")
        for row in c.execute("SELECT * FROM Plants"):
            if row[1] == 'PlantFour':
                plant = row[0]
        for row in c.execute("SELECT * FROM Systems"):
            if row[2] == plant and row[1] == "Turbine":
                system = row[0]
        for row in c.execute("SELECT * FROM Sensors"):
            if row[2] == system and row[1] == "Pressure":
                sensor = row[0]
        value = factory.get_sensor_value('PlantFour', 'Turbine', 'Pressure')
        c.execute("INSERT INTO SensorValues VALUES (" + str(time.time()) + "," + str(sensor) + "," + str(value) + ")")
        for row in c.execute("SELECT * FROM Plants"):
            if row[1] == 'PlantFour':
                plant = row[0]
        for row in c.execute("SELECT * FROM Systems"):
            if row[2] == plant and row[1] == "Teslacoil":
                system = row[0]
        for row in c.execute("SELECT * FROM Sensors"):
            if row[2] == system and row[1] == "Humidity":
                sensor = row[0]
        value = factory.get_sensor_value('PlantFour', 'Teslacoil', 'Humidity')
        c.execute("INSERT INTO SensorValues VALUES (" + str(time.time()) + "," + str(sensor) + "," + str(value) + ")")
        for row in c.execute("SELECT * FROM Plants"):
            if row[1] == 'PlantFour':
                plant = row[0]
        for row in c.execute("SELECT * FROM Systems"):
            if row[2] == plant and row[1] == "Teslacoil":
                system = row[0]
        for row in c.execute("SELECT * FROM Sensors"):
            if row[2] == system and row[1] == "Temperature":
                sensor = row[0]
        value = factory.get_sensor_value('PlantFour', 'Teslacoil', 'Temperature')
        c.execute("INSERT INTO SensorValues VALUES (" + str(time.time()) + "," + str(sensor) + "," + str(value) + ")")
        for row in c.execute("SELECT * FROM Plants"):
            if row[1] == 'PlantFour':
                plant = row[0]
        for row in c.execute("SELECT * FROM Systems"):
            if row[2] == plant and row[1] == "Teslacoil":
                system = row[0]
        for row in c.execute("SELECT * FROM Sensors"):
            if row[2] == system and row[1] == "Pressure":
                sensor = row[0]
        value = factory.get_sensor_value('PlantFour', 'Teslacoil', 'Pressure')
        c.execute("INSERT INTO SensorValues VALUES (" + str(time.time()) + "," + str(sensor) + "," + str(value) + ")")
        for row in c.execute("SELECT * FROM Plants"):
            if row[1] == 'PlantFour':
                plant = row[0]
        for row in c.execute("SELECT * FROM Systems"):
            if row[2] == plant and row[1] == "Fluxcapacitor":
                system = row[0]
        for row in c.execute("SELECT * FROM Sensors"):
            if row[2] == system and row[1] == "Humidity":
                sensor = row[0]
        value = factory.get_sensor_value('PlantFour', 'Fluxcapacitor', 'Humidity')
        c.execute("INSERT INTO SensorValues VALUES (" + str(time.time()) + "," + str(sensor) + "," + str(value) + ")")
        for row in c.execute("SELECT * FROM Plants"):
            if row[1] == 'PlantFour':
                plant = row[0]
        for row in c.execute("SELECT * FROM Systems"):
            if row[2] == plant and row[1] == "Fluxcapacitor":
                system = row[0]
        for row in c.execute("SELECT * FROM Sensors"):
            if row[2] == system and row[1] == "Temperature":
                sensor = row[0]
        value = factory.get_sensor_value('PlantFour', 'Fluxcapacitor', 'Temperature')
        c.execute("INSERT INTO SensorValues VALUES (" + str(time.time()) + "," + str(sensor) + "," + str(value) + ")")
        for row in c.execute("SELECT * FROM Plants"):
            if row[1] == 'PlantFour':
                plant = row[0]
        for row in c.execute("SELECT * FROM Systems"):
            if row[2] == plant and row[1] == "Fluxcapacitor":
                system = row[0]
        for row in c.execute("SELECT * FROM Sensors"):
            if row[2] == system and row[1] == "Pressure":
                sensor = row[0]
        value = factory.get_sensor_value('PlantFour', 'Fluxcapacitor', 'Pressure')
        c.execute("INSERT INTO SensorValues VALUES (" + str(time.time()) + "," + str(sensor) + "," + str(value) + ")")
