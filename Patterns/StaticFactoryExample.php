<?php
class MessengerStaticFactory
{
    public static function build(string $type, string $recipient) : Messenger
    {
        switch ($type) {
            case "email":
                $sender = 'odmen1337@gmail.com';
                $messenger =  new Messenger($sender, $recipient);
                $messenger->toEmail();
                return $messenger;
                break;
            case "phone":
                $sender = '+380987654321';
                $messenger = new Messenger($sender, $recipient);
                $messenger->toSms();
                return $messenger;
                break;
            default:
                throw new Exception("Wrong messenger format \"$type\"");
        }
    }
}


class Messenger
{
    private string $type;
    private string $sender;
    private string $recipient;

    /**
     * Messenger constructor.
     * @param string $sender
     * @param string $recipient
     */
    public function __construct( string $sender, string $recipient)
    {
        $this->sender = $sender;
        $this->recipient = $recipient;
    }

    public function toEmail()
    {
        $this->type = 'Email';
    }

    public function toSms()
    {
        $this->type = 'SMS';
    }

    public function send(string $message)
    {
        //send logic
        //check
        echo "Sending message ($message) on $this->type to [$this->recipient] ";
    }

}

$messenger = MessengerStaticFactory::build('email', 'user123@mail.ru');
$messenger->send('hello'); echo "<br>";
$messenger = MessengerStaticFactory::build('phone', '+380123456789');
$messenger->send('hi'); echo "<br>";

