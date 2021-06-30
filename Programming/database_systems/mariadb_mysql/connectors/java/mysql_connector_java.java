// https://dev.mysql.com/doc/connector-j/8.0/en/connector-j-usagenotes-connect-drivermanager.html

import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.SQLException;
import java.sql.Statement;
import java.sql.ResultSet;

// Notice, do not import com.mysql.cj.jdbc.* or you will have problems!

public class mysql_connector_java {

    static final String DB_URL = "jdbc:mysql://192.168.0.2/database_test";
    static final String DB_USER = "user_test";
    static final String DB_PW = "%user_test1992";

    public static void main(String[] args) {

        try {
             // register MySQL Connector/J with the DriverManager
            // The newInstance() call is a workaround for some
            // broken Java implementations
            Class.forName("com.mysql.cj.jdbc.Driver").newInstance();

            Connection con = DriverManager.getConnection(DB_URL, DB_USER, DB_PW);
            Statement = stmt = con.createStatement();

        } catch (Exception ex) {
            System.out.println("SQLException: " + ex.getMessage());
            System.out.println("SQLState: " + ex.getSQLState());
            System.out.println("VendorError: " + ex.getErrorCode());
        }

        // execute SQL-Statements
        Statement stmt = null;
        ResultSet rs = null;

        try {
            stmt = con.createStatement();
            rs = stmt.executeQuery("Select * from department order by id asc;");
            while(rs.next()) {
                System.out.print("ID: " + rs.getInt("id"));
                System.out.println(", name: " + rs.getString("name"));
            }
        } catch (SQLException ex) {
            // handle any errors
            System.out.println("SQLException: " + ex.getMessage());
            System.out.println("SQLState: " + ex.getSQLState());
            System.out.println("VendorError: " + ex.getErrorCode());
        }

    }
}