<?php
    // https://www.php.net/manual/en/book.mysqli.php

    /*

    ========= MYSQLI =========

        === Properties ===
        mysqli->connect_error                       returns description of last connection error or null
        mysqli->client_info                         returns mysql client info as string
        mysqli->client_version                      returns mysql client version as integer
        mysqli->host_info                           returns used connection as string
        mysqli->protocol_version                    returns version of mysql protocol
        mysqli->server_info                         returns mysql server info as string
        mysqli->server_version                      returns mysql server version as integer

        === Methods ===
        mysqli(servername, user, password)          constructor
        mysqli->multiquery(query_strings)           execute multiple semicolon-separated queries
        mysqli->prepare(query_string)               return a statement object for query_string (can contain one or more placeholders)
                                                    placeholders can not be used
                                                        - in ddl statements
                                                        - as identifiers (column names, table names)
        mysqli->query($sql)                         perform query on server and return resultset and boolean
        mysqli->real_escape_string(query_string)    return escaped query_string to prevent SQL Injections
        mysqli->store_result()                      return mysqli_result for multiquery



    ========= STATEMENT =========

        === Properties ===
        statement->num_rows                                     return number of result rows; requires previous call of ->store_result()                                      

        === Methods ===
        statement->bind_param(type_string, param_1, ...)        bind parameters to the ?-placeholders and return boolean
                                                                type_string consists of one of the following type characters 
                                                                for each parameter:
                                                                    i       Integer
                                                                    d       Double
                                                                    s       String
                                                                    b       blob
        statement->bind_result(variable1, ...)                  bind columns of result to variables and return boolean
        statement->data_seek(index)                             set result pointer to index
        statement->execute()                                    execute prepared statement and return boolean
        statement->fetch()                                      fetch result of prepared statement execution into bound result variables
        statement->get_result()                                 return result of prepared statement as a mysqli_result object
        statement->result_metadata()                            return result data set metadata as result object
        statement->store_result()                               store result set in an internal buffer (required for statement->num_row)
        


    ========= RESULT =========

        === Properties ===
        $result->field_count                return number of columns in result set
        $result->num_rows                   return number of rows in result set
        $result->lengths                    return array with lengths of the columns of the currently selected row
        
        === Methods ===
        $result->close()                    frees memory associated with result
        $result->data_seek(index)           set result pointer to index
        $result->fetch_all(mode)            fetch ALL result rows as an associative array (mode: MYSQLI_ASSOC)
                                            or numeric (mode MYSQLI_NUM) array
        $result->fetch_array(mode)          fetch a result row as an associative array (mode: MYSQLI ASSOC)
                                            or numeric (mode MYSQLI_NUM) array
        $result->fetch_object()             return current row of a result set as an object (object->columnname)
        $result->fetch_field_direct(index)  return [object] containing meta data for column [index]
                                                [object]->name              column name or alias
                                                [object]->orgname           original column name
                                                [object]->table             table name or alias
                                                [object]->orgtable          original table name
                                                [object]->max_length        max length of actual content of column
                                                [object]->length            width of column in bytes according to table definition
                                                [object]->flags             integer representing bit-flags for the column
                                                [object]->type              id of data type
    */

    $servername = "servername";
    $username = "username";
    $password = "password";

    $connection = new mysqli($servername, $username, $password);

    if (!$connection->connect_error) {


        // === Query database with dql-statements ===


            // query database with sql-string
            $sql = "[sql_dql_dml_statement | call procedurename(args)";
            $result = $connection->query($sql); //escape query string to prevent SQL Injections
            // access result, see "Iterate over query results"
            $result->close();


            // query database with multiple statements
            $connection->multi_query("Statement_1; ... ;Statement_n;");
            do {
                if ($result = $connection->store_result()) {
                    // access result , see "Iterate over query results
                }
            } while($connection->next_result());
            $result->close();


            // query database with prepared statement
            $sql_dql_dml = "[select attr_1, ... , attr_n from table_name [where column_1 >= ? and column_2 <= ?] |
                             call procedurename(?,...,?)]";
            $statement = $con->prepare($sql);
            $statement->bind_param("id", $parameter_1, $parament_2);
            $statement->execute();
            $result = $statement->get_result();
            // access result, see "Iterate over query results"
            $result->close();
            $statement->close();




        // === Iterate over query results ===


            // get SINGLE row as an object
            while ($object = $result->fetch_object()) {
                //access record with $object->column_name
            }


            // set pointer back to first record; required to iterate over
            // a resultset again. Not used in the following for simplicity reasons only.
            $result->data_seek(0);


            // get SINGLE row as an associative array
            while ($record = $result->fetch_array(MYSQLI_ASSOC)) {
                //access record with $record["column_name"]
            } 
            $result->close();


            // get SINGLE row as a numeric array
            while ($record = $result->fetch_array(MYSQLI_NUM)) {
                // access record with $record[index]

                // iterate over array:
                // for ($i=0; $i<count($record); $i++) {
                //      access record with $record[$i]
                // }
            }
            $result->close();


            // get ALL rows as an associative array
            $resultset = $result->fetch_all(MYSQLI_ASSOC);
            foreach($resultset as $record) {
                // access record with $record["column_name"]
            }
            $result->close();


            // get ALL rows as a numeric array
            $resultset = $result->fetch_all(MYSQLI_NUM);
            foreach($resultset as $record) {
                // access record with $record[index]

                // iterate over array:
                // for ($i=0; $i<count($record); $i++) {
                //      access record with $record[$i]    
                // }
            }
            $result->close();

   


        // === Transaction ===



        //close connection
        $connection->close();
            
    }

?>