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
  $mysql_query1 = "CREATE TABLE Customer (customerID INT AUTO_INCREMENT, customerName VARCHAR (50),
  customerPassword VARCHAR(15), customerPhone VARCHAR(20), customerEmail VARCHAR(25), PRIMARY KEY(customerID))";
  
  $mysql_query2 = "CREATE TABLE RoomOwner (ownerID INT AUTO_INCREMENT, ownerName VARCHAR (50),
  ownerPassword VARCHAR(15), ownerPhone VARCHAR(20), ownerEmail VARCHAR(25), PRIMARY KEY(ownerID))";

  $mysql_query3 = "CREATE TABLE Room (roomID INT AUTO_INCREMENT, roomName VARCHAR (50),
  roomDesc VARCHAR(150), roomCapacity INT, roomPrice INT, ownerID INT, PRIMARY KEY(roomID),
  FOREIGN KEY(ownerID) REFERENCES RoomOwner(ownerID))";

  $mysql_query4 = "CREATE TABLE Booking (bookingID INT AUTO_INCREMENT, dateBegin DATE,
  dateEnd DATE, customerID INT, ownerID INT, roomID INT, PRIMARY KEY(bookingID),
  FOREIGN KEY(customerID) references Customer(customerID),
  FOREIGN KEY(ownerID) references RoomOwner(ownerID),
  FOREIGN KEY(roomID) references Room(roomID))";


  if ($link->query($mysql_query1) === TRUE) {
    echo "Table Customer is created successfully.". "<br>" ;
  } else {
    echo "Error creating Customer table: "."<br>". $link->error;
  }

  if ($link->query($mysql_query2) === TRUE) {
    echo "Table Owner is created successfully."."<br>" ;
  } else {
    echo "Error creating Owner table: "."<br>" . $link->error;
  }

  if ($link->query($mysql_query3) === TRUE) {
    echo "Table Room is created successfully."."<br>";
  } else {
    echo "Error creating Room table: "."<br>" . $link->error;
  }

  if ($link->query($mysql_query4) === TRUE) {
    echo "Table Booking is created successfully."."<br>";
  } else {
    echo "Error creating Booking table: "."<br>" . $link->error;
  }

  $link->close();
  
?>