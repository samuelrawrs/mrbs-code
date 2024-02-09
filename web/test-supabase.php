<?php
// Supabase connection parameters
$host = ''; // Replace with your Supabase host
$dbname = ''; // Replace with your Supabase database name
$user = ''; // Replace with your Supabase user
$password = ''; // Replace with your Supabase password
// Supabase connection parameters (unfilled for security)


// PDO connection string
$dsn = "pgsql:host=$host;dbname=$dbname";

try {
  // Create a PDO instance to connect to the Supabase database
  $pdo = new PDO($dsn, $user, $password);
  echo "Connected successfully to Supabase PostgreSQL database!";
} catch (PDOException $e) {
  // If there is an error in the connection, catch it and display the error message
  echo "Connection failed: " . $e->getMessage();
}
