<?php
    class GuestController{
        public function showGuess(){
            include __DIR__ . '/../views/guess_book_form.php';
        }

        public function addGuess(){
            $data = json_decode(file_get_contents('php://input'), true);

            if(empty($data['name']) || empty($data['message'])){
                http_response_code(422);
                echo json_encode(['success' => false, 'message' => 'Guess is required']);
                return;
            }

            require_once __DIR__ . '/../models/GuessBook.php';
            $guess = new GuessBook();
            $guess->save($data['name'], $data['message']);
            echo json_encode(['success' => true, 'message' => 'Guest Added to the record']);
        }

        public function showGuest(){
            require_once __DIR__ . '/../models/GuessBook.php';
            $guest = new GuessBook();
            $entries = $guest->showAll();
            include_once __DIR__ . '/../views/guess_book_form.php';
        }
    }
?>