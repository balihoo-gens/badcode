import sqlite3


class PlantDatabase(object):

    system_types = [ "Turbine", "Teslacoil", "Fluxcapacitor" ]
    sensor_types = [ "Humidity", "Temperature", "Pressure"]

    def __init__(self, db_name):
        self._conn = sqlite3.connect(db_name)
        self._cursor = self._conn.cursor()
        self.system_types = PlantDatabase.system_types
        self.sensor_types = PlantDatabase.sensor_types

    def close(self):
        self._conn.close()

    def create(self):
        self._create_tables()
        self._insert_statuses()
        plantcount = self._insert_plants()
        syscount = self._insert_systems(plantcount)
        self._insert_sensors(syscount)

    def _create_tables(self):
        c = self._cursor
        c.execute("CREATE TABLE Plants (Id, Name, Location)")
        c.execute("CREATE TABLE Systems (Id, Type, PlantId)")
        c.execute("CREATE TABLE Sensors (Id, Type, SystemId)")
        c.execute("CREATE TABLE SensorValues (Time, SensorId, Value)")
        c.execute("CREATE TABLE SystemStatus (Time, SystemId, StatusId)")
        c.execute("CREATE TABLE StatusCodes (Id, Code, Description)")
        self._conn.commit()

    def _insert_statuses(self):
        query = "INSERT INTO StatusCodes VALUES (?, ?, ?)"
        records = [
            (0, "NONE", "No status"),
            (1, "GREEN", "Fully Operational"),
            (2, "YELLOW", "Some Errors, but working"),
            (3, "RED", "Disabled")
        ]
        self._cursor.executemany(query, records)
        self._conn.commit()
        return len(records)


    def _insert_plants(self):
        query = "INSERT INTO Plants VALUES (?, ?, ?)"
        records = [
            (0, "PlantZero", "Boise"),
            (1, "PlantOne", "Chicago"),
            (2, "PlantTwo", "Boise"),
            (3, "PlantThree", "Chicago"),
            (4, "PlantFour", "Boise")
        ]
        self._cursor.executemany(query, records)
        self._conn.commit()
        return len(records)

    def _insert_systems(self, plant_count):
        query = "INSERT INTO Systems VALUES (?, ?, ?)"
        record_count = len(self.systypes) * plant_count
        #one type of system for each plant
        combos = [(s,p) for s in self.systypes for p in range(plant_count)]
        #attach the index to each combo
        records = [(i,) + combo for i, combo in enumerate(combos)]
        self._cursor.executemany(query, records)
        self._conn.commit()
        return len(records)

    def _insert_sensors(self, system_count):
        query = "INSERT INTO Sensors VALUES (?, ?, ?)"
        record_count = len(self.sensor_types) * system_count
        #one type of sensor for each system
        combos = [(sen,sys) for sen in self.sensor_types for sys in range(system_count)]
        #attach the index to each combo
        records = [(i,) + combo for i, combo in enumerate(combos)]
        self._cursor.executemany(query, records)
        self._conn.commit()
        return len(records)

    def show(self):
        names = ["Plants", "Systems", "Sensors", "StatusCodes"]
        for name in names:
            print(name)
            for row in self._cursor.execute("SELECT * FROM %s" % name):
                print(row)

def main():
    pdb = PlantDatabase('plants.db')
    pdb.create()
    pdb.show()
    pdb.close()

if __name__ == "__main__":
    main()
