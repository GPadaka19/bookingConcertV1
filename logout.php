<?php
session_start();
session_destroy();
header("location: ../bookingConcertV1/home.php");
