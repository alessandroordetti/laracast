<?php 

namespace Core;

class Fakedata
{
    public static function generateData(){
        $randomQuotes = [
            "The only way to do great work is to love what you do. – Steve Jobs",
            "Life is what happens when you're busy making other plans. – John Lennon",
            "The future belongs to those who believe in the beauty of their dreams. – Eleanor Roosevelt",
            "It does not matter how slowly you go as long as you do not stop. – Confucius",
            "In three words I can sum up everything I've learned about life: it goes on. – Robert Frost",
            "No one can make you feel inferior without your consent. – Eleanor Roosevelt",
            "The best and most beautiful things in the world cannot be seen or even touched - they must be felt with the heart. – Helen Keller",
            "Keep smiling, because life is a beautiful thing and there's so much to smile about. – Marilyn Monroe",
            "Life is really simple, but we insist on making it complicated. – Confucius",
            "The purpose of our lives is to be happy. – Dalai Lama"
        ];
        

        shuffle($randomQuotes);

        return $randomQuotes;
    }
}