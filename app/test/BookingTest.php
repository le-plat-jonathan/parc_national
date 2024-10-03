<?php

use PHPUnit\Framework\TestCase;

require_once __DIR__ . '/../models/Booking.php';

class BookingTest extends TestCase {

    public function testGetAllBooking()
    {
     $booking = new Booking();

     $result = $booking->getAllBooking();

     $this->assertIsArray($result, "Ce n'est pas un array comme attendu");
    }

    public function testGetBookingById()
    {
     $booking = new Booking();

     $result = $booking->getBookingById(1);

     $this->assertIsArray($result, "Ce n'est pas un array comme attendu");
    }

    public function testCreateBooking()
    {
        $booking = new Booking();

        $start_date = '2024-10-10';
        $end_date = '2024-10-10';
        $status = 'confirmed';
        $user_id = 1;
        $bungalow_id = 1;

        $result = $booking->createBooking($start_date, $end_date, $status, $user_id, $bungalow_id);

     $this->assertTrue($result, "Retour false");
    }

    public function testUpdateBooking()
    {
     $booking = new Booking();

     $result = $booking->updateBooking(1, '$start_date', '$end_date', '$status', 1, 1);

     $this->assertTrue($result, "Retour false");
    }

    public function testDeleteBooking()
    {
     $booking = new Booking();

     $result = $booking->deleteBooking(1);

     $this->assertTrue($result, "Retour false");
    }
}