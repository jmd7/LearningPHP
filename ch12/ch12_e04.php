<?php
    include "ch12_e00.php";

    // Connect to the database
    try {
        $db = new PDO('sqlite:./ch12.db');
    //} catch ($e) {
    } catch (PDOException $e) {
        die("Can't connect: " . $e->getMessage());
    }
    
    // Set up exception error handling
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // Set up fetch mode: rows as arrays
    $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    
    // Get the array of dish names from the database
    $dish_names = array();
    $res = $db->query('SELECT dish_id,dish_name FROM dishes');
    
    foreach ($res->fetchAll() as $row) {
        //$dish_names[ $row['dish_id']]] = $row['dish_name'];
        $dish_names[$row['dish_id']] = $row['dish_name'];
    }
    
    //$res = $db->query('SELECT ** FROM customers ORDER BY phone DESC');
    $res = $db->query('SELECT * FROM customer ORDER BY cust_phone DESC');
    
    $customers = $res->fetchAll();
    //if (count($customers) = 0) {
    if (count($customers) == 0) {
        print "No customers.";
    } else {
        print '<table>';
        print '<tr><th>ID</th><th>Name</th><th>Phone</th>
        <th>Favorite Dish</th></tr>';
        foreach ($customers as $customer) {
            printf("<tr><td>%d</td><td>%s</td><td>%f</td><td>%s</td></tr>\n",
                   $customer['cust_id'],
                   htmlentities($customer['cust_name']),
                   $customer['cust_phone'],
                   $dish_names[$customer['cust_favorite']]);
        }
    }
    print '</table>';
?>