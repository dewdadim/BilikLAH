<?php

  //connect to server
  $link = mysqli_connect("localhost", "root", "");
  if (!$link) {
      die('Could not connect: ' . mysqli_connect_error());
  }


  //create database
  $mysql_query = "CREATE DATABASE biliklah_db";
  
  if ($link->query($mysql_query) === TRUE) {
    echo "Database is created successfully.". "<br>" ;
  } else {
    echo "Error creating Database: "."<br>". $link->error;
  }


  //use database
  mysqli_select_db($link,"biliklah_db") or die(mysqli_connect_error());



  //mysql query
  $mysql_query1 = "CREATE TABLE Customer (customerName VARCHAR (50), customerEmail VARCHAR(40), 
  customerPhone VARCHAR(20), customerPassword VARCHAR(15), PRIMARY KEY(customerEmail))";
  
  $mysql_query2 = "CREATE TABLE RoomOwner (ownerName VARCHAR (50), ownerEmail VARCHAR(40),
  ownerPhone VARCHAR(20), ownerPassword VARCHAR(15), PRIMARY KEY(ownerEmail))";

  $mysql_query3 = "CREATE TABLE Room (roomID INT AUTO_INCREMENT, roomName VARCHAR (50), 
  roomImg VARCHAR (50), roomCapacity INT, roomPrice INT, ownerEmail VARCHAR(40), PRIMARY KEY(roomID),
  FOREIGN KEY(ownerEmail) REFERENCES RoomOwner(ownerEmail))";

  $mysql_query4 = "CREATE TABLE Booking (bookingID INT AUTO_INCREMENT, dateBegin DATE,
  dateEnd DATE, customerEmail VARCHAR(40), ownerEmail VARCHAR(40), roomID INT,
  PRIMARY KEY(bookingID),
  FOREIGN KEY(customerEmail) references Customer(customerEmail),
  FOREIGN KEY(ownerEmail) references RoomOwner(ownerEmail),
  FOREIGN KEY(roomID) references Room(roomID))";


  if ($link->query($mysql_query1) === TRUE) {
    // echo "Table Customer is created successfully.". "<br>" ;
  } else {
    echo "Error creating Customer table: "."<br>". $link->error;
  }

  if ($link->query($mysql_query2) === TRUE) {
    // echo "Table Owner is created successfully."."<br>" ;
  } else {
    echo "Error creating Owner table: "."<br>" . $link->error;
  }

  if ($link->query($mysql_query3) === TRUE) {
    // echo "Table Room is created successfully."."<br>";
  } else {
    echo "Error creating Room table: "."<br>" . $link->error;
  }

  if ($link->query($mysql_query4) === TRUE) {
    // echo "Table Booking is created successfully."."<br>";
  } else {
    echo "Error creating Booking table: "."<br>" . $link->error;
  }

  $link->close();
  
?>