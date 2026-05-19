<?php

//Pascal Case
class Student
{
    public $name; // data

    public function greet()
    {
        return "Hello My Name is " . $this->name;
    }
}
$studentCICT1 = new Student();
$studentCICT1->name = "Reiniel";

$studentCICT2 = new Student();
$studentCICT2->name = "FlipperPanda";

// object - instance class 
// method - Function Class 

class Person
{
    public $personName;
    public function __construct($personName)
    {
        $this->personName = $personName;
        echo "Object Created: " . $this->personName . "<br>";
    }
}
$p1 = new Person("Reiniel");
$p2 = new Person("Flipper");
$p2 = new Person("Panda");

echo $studentCICT1->greet();


class BankAccount
{
    private $owner;
    private $balance;


    public function __construct($owner, $bal)
    {
        $this->owner = $owner;
        $this->setBalance($bal);
    }


    public function getOwner()
    {
        return $this->owner;
    }

    public function getBalance()
    {
        return $this->balance;
    }

    public function setOwner($name)
    {
        $this->owner = $name;
    }

    public function setBalance($amount)
    {
        if ($amount >= 0) {
            $this->balance = +$amount;
        }
    }

    public function deposit($amount)
    {
        if ($amount > 0) {
            $this->balance += $amount;
        }
    }

    public function withdraw($amount)
    {
        if ($amount > 0 && $amount <= $this->balance) {
            $this->balance -= $amount;
        }
    }
}

$account1 = new Bankaccount("Reiniel", 100000);
$account2 = new Bankaccount("FlipperPanda", 50000);


$account1->withdraw(20000);
$account2->deposit(2000000000);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Bank UI</title>

    <script src="https://cdn.tailwindcss.com"></script>

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Inter', 'ui-sans-serif', 'system-ui'],
                    },
                    colors: {
                        base: "#EEEDEA",
                        primary: "#5C59C3",
                        ink: "#2B2A52",
                    }
                }
            }
        }
    </script>
</head>

<body class="bg-base font-sans text-ink min-h-screen flex items-center justify-center">

    <div class="max-w-4xl w-full px-6">

        <h1 class="text-3xl font-semibold tracking-tight mb-8 text-center">
            Bank Accounts Overview
        </h1>

        <div class="grid md:grid-cols-2 gap-8">

            <!-- Card 1 -->
            <div class="bg-white rounded-2xl shadow-lg p-6 border border-neutral-200">

                <p class="text-sm text-neutral-500">Account Holder</p>
                <?= $account1->getOwner() ?>
                <h2 class="text-xl font-semibold mt-1">

                </h2>

                <div class="mt-6 bg-base rounded-xl p-4">
                    <p class="text-sm text-neutral-500">Current Balance</p>
                    <p class="text-2xl font-bold text-primary mt-1">
                        ₱ <?= number_format($account1->getBalance()) ?>
                    </p>
                </div>

            </div>

            <!-- Card 2 -->
            <div class="bg-white rounded-2xl shadow-lg p-6 border border-neutral-200">

                <p class="text-sm text-neutral-500">Account Holder</p>
                <?= $account2->getOwner() ?>
                <h2 class="text-xl font-semibold mt-1">

                </h2>

                <div class="mt-6 bg-base rounded-xl p-4">
                    <p class="text-sm text-neutral-500">Current Balance</p>
                    <p class="text-2xl font-bold text-primary mt-1">
                        ₱ <?= number_format($account2->getBalance()) ?>
                    </p>
                </div>

            </div>

        </div>

    </div>

</body>

</html>