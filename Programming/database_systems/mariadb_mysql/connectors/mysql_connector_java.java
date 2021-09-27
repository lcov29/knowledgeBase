// https://dev.mysql.com/doc/connector-j/8.0/en/connector-j-usagenotes-connect-drivermanager.html
// https://www.tutorialspoint.com/jdbc/index.htm

// Prerequisites
// 1.) Install jdbc connector on client and add it to the classpath
// 2.) Add DB User: <user>@<client_hostname>

import java.sql.Connection;
import java.sql.DatabaseMetaData;
import java.sql.DriverManager;
import java.sql.JDBCType;
import java.sql.SQLException;
import java.sql.Statement;
import java.sql.PreparedStatement;
import java.sql.CallableStatement;
import java.sql.ResultSet;
import java.sql.ResultSetMetaData;

public class mysql_connector_java {

    /* Database url format
        MySQL:  jdbc:mysql://hostname/databaseName
        ORALCE: jdbc:oracle:thin:@hostname:portNumber:databaseName
    */
    static final String DB_URL = "jdbc:mysql://<hostname>/<database>";
    static final String DB_USER = "<user>";	//is converted into <user>@<client_hostname>
    static final String DB_PW = "<password>";

    public static void main(String[] args) {

        Connection con = null;
        Statement stmt = null;
        Statement stmt2 = null;
        PreparedStatement pstmt = null;
        CallableStatement cstmt = null;
        ResultSet rs = null;
        ResultSetMetaData metadata = null;

        try {

             // register MySQL Connector/J with the DriverManager
            Class.forName("com.mysql.cj.jdbc.Driver").newInstance();
            // The newInstance() call is a workaround for some
            // broken Java implementations
            

            // connect to database
            con = DriverManager.getConnection(DB_URL, DB_USER, DB_PW);


            /* -------------- Statement --------------
                - for general purpose access
                - for static SQL statements at runtime
                - cannot accept parameters
            */
            stmt = con.createStatement();

            // return if a ResultSet can be retrieved. Use primarily for DDL statements
            stmt.execute("create table table_test(content varchar(20), number int, primary key (content))ENGINE=InnoDB;"); //false
            stmt.execute("select * from table_test;"); //true
            
            // returns the number of rows affected. Use for DML statements
            stmt.executeUpdate("insert into table_test (content) values ('test1'), ('test2');"); //2
    
            // returns a resultset. Use for DQL statements
            stmt.executeQuery("Select * from table_test;"); //query result


            /* -------------- PreparedStatement -------------- 
                - statements are reusable
                - accepts input parameters at runtime
                - parameters are represented by ? and addressed with setXXX(index, value)
                - execution methods: execute(), executeUpdate(), executeQuery() (see Statement)
            */
            pstmt = con.prepareStatement("Insert into table_test (content, number) values (?, ?);");
            int parameter_index_1 = 1;
            int parameter_index_2 = 2;
            for (int i = 1; i < 6; i++) {
                pstmt.setString(parameter_index_1, "prepareStatement" + Integer.toString(i));
                pstmt.setInt(parameter_index_2, i);
                pstmt.execute();
            }


            /* -------------- CallableStatement -------------- 
                - access stored procedures
                - can accept runtime input parameters
            */

            /* call stored procedure to access result as out parameter

                CREATE PROCEDURE `test`(in param1 varchar(50), 
                                        in param2 varchar(50), 
                                        in separator_sign varchar(10), 
                                        out result varchar(100))
                BEGIN   
                    SET result := concat_ws(separator_sign, param1, param2);
                END
            */
            cstmt = con.prepareCall("{call test(?,?,?,?)}");
            cstmt.setString(1, "Hello");
            cstmt.setString(2, "World");
            cstmt.setString(3, "_");
            cstmt.registerOutParameter(4, JDBCType.VARCHAR);
            cstmt.execute();
            System.out.println("Result of procedure 'test': " + cstmt.getString(4));
            cstmt.close();

            /* call stored procedure to access result as result set
                CREATE PROCEDURE `getNumberOfEmployeesPerDepartment`(in min_salary_class int)
                BEGIN   
                    Select dep.name, count(*) as NumberEmployees   
                    From employees emp 
                        inner join department dep on emp.department_id = dep.id        
                        inner join salary sal on emp.salary_id = sal.id   
                    Where sal.class >= min_salary_class   
                    Group by dep.name;
                END
            */
            cstmt = con.prepareCall("{call getNumberOfEmployeesPerDepartment(?)}");
            cstmt.setInt(1, 2);
            rs = cstmt.executeQuery();


            // -------------- Resultset --------------

            /* standard configuration as in createStatement():
                - TYPE_FORWARD_ONLY: cursor can only move forward
                - CONCUR_READ_ONLY: result set is read only */
            stmt = con.createStatement(ResultSet.TYPE_FORWARD_ONLY, ResultSet.CONCUR_READ_ONLY);
            rs = stmt.executeQuery("select * from department order by id asc;");

            // access attribute by index
            rs.next();
            System.out.println("id: " + rs.getString(1) + ", name: " + rs.getString(2));

            // access attribute by name
            rs.next();
            System.out.println("id: " + rs.getString("id") + ", name: " + rs.getString("name"));

            // access metadata of result set
            metadata = rs.getMetaData();
            //for each column of current row
            for (int index = 1; index <= metadata.getColumnCount(); index++) {
                System.out.println("------ column index: " + Integer.toString(index) + "--------");
                System.out.println("column_name: " + metadata.getColumnName(index));
                System.out.println("column type: " + Integer.toString(metadata.getColumnType(index)));
                System.out.println("schema_name:" + metadata.getSchemaName(index));
                System.out.println("table_name:" + metadata.getTableName(index));
            }

            // iterate through all attributes by index
            rs.close();
            rs = stmt.executeQuery("select * from department order by id asc;");
            metadata = rs.getMetaData();
            while(rs.next()) {
                for (int i = 1; i <= metadata.getColumnCount(); i++) {
                    System.out.print(metadata.getColumnName(i) + ": " + rs.getString(i) + " | ");
                }
                System.out.println();
            }
            stmt.close();


            /* 
                - TYPE_SCROLL_INSENSITIVE: cursor can move forward and backward, result is not affected by later changes of other users to the database
                - CONCUR_UPDATABLE: changes to the resultset can also be applied to the datasource
            */
            stmt = con.createStatement(ResultSet.TYPE_SCROLL_INSENSITIVE, ResultSet.CONCUR_UPDATABLE);
            rs = stmt.executeQuery("Select * from table_test;");

            // iterate backward
            rs.afterLast();
            while(rs.previous()) {
                System.out.println("content: " + rs.getString("content") + " | number: " + rs.getString("number"));
            }

            // manipulate resultset: insert a new record;
            rs.moveToInsertRow(); // move to special insertrow (buffer), cursor stays in place
            rs.updateString(1, "insert by rs");
            rs.updateInt(2, 5);
            rs.insertRow(); // insert into resultset and database

            // manipulate resultset: update record by integer
            rs.absolute(3); // moves the cursor to the third record 
            rs.updateString(1, "update by rs");
            rs.updateInt(2, -500);
            rs.updateRow(); // update record in resultset and database

            // manipulate resultset: delete row
            rs.absolute(4);
            rs.deleteRow(); // delete record in resultset and database

            // manipulate database: insert by other statement -> ignored by resultset
            stmt2 = con.createStatement();
            stmt2.execute("Insert into table_test values ('new_content', 1000);");
            stmt2.close();

            // iterate forward, manipulation by other statement did not affect resultset (-> TYPE_SCROLL_INSENSITIVE)
            System.out.println("--------------------------------------------------------");
            rs.beforeFirst();
            while(rs.next()) {
                System.out.println("content: " + rs.getString("content") + " | number: " + rs.getString("number"));
            }
            rs.close();
            stmt.close();


            /*
                - TYPE_SCROLL_SENSITIVE: cursor can move forward and backward, result is affected by later changes of other users to the database
                - CONCUR_UPDATABLE: changes to the resultset can also be applied to the datasource
            */
            /*
            stmt = con.createStatement(ResultSet.TYPE_SCROLL_SENSITIVE, ResultSet.CONCUR_UPDATABLE);
            rs = stmt.executeQuery("select * from table_test");
            stmt2 = con.createStatement();
            stmt2.execute("Insert into table_test values ('new_content_2', 2000);");
            while(rs.next()) {
                System.out.println("content: " + rs.getString("content") + " | number: " + rs.getString("number"));
            }*/


            // -------------- manual Transaction --------------
            con.setAutoCommit(false); // enable manual transaction
            stmt = con.createStatement();
            stmt.executeUpdate("Insert into table_test values ('transaction_s1', 5400);");
            stmt.executeUpdate("Insert into table_test values ('transaction_s2', 800);");
            con.commit(); // changes are writtten to the database

            stmt.executeUpdate("Insert into table_test values ('transaction_s3', 2000);");
            stmt.executeUpdate("Insert into table_test values ('transaction_s4', 1000);");
            con.rollback(); // changes are discarded
            stmt.close();


            // -------------- Batch Processing --------------
            // group related DDL and DML statements in a batch to submit them all in one call
            // advantage: less communication overhead --> improved performance
            boolean batch_support = con.getMetaData().supportsBatchUpdates(); // is batch processing enabled?
            con.setAutoCommit(false);
            stmt = con.createStatement();
            stmt.addBatch("Insert into table_test values ('batch_s1', 1);");
            stmt.addBatch("Insert into table_test values ('batch_s2', 2);");
            stmt.addBatch("Insert into table_test values ('batch_s3', 3);");
            int[] count = stmt.executeBatch(); //update count for each statement in the batch
            con.commit();
            stmt.close();


        } catch (Exception ex) {
            System.out.println("Exception: " + ex.getMessage());
        } finally {
            // make sure to close the database connection 
            try {
                stmt.close();
                stmt2.close();
                pstmt.close();
                cstmt.close();
                con.close();
            } catch (SQLException ex) {
                System.out.println("SQLException: " + ex.getMessage());
            }

        }
    }
}
