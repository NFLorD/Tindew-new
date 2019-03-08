<?php 

// Builds the database
// require_once 'vendor/fzaninotto/faker/src/autoload.php';
// $faker = Faker\Factory::create();
// $usersTable = new Users();
// $statusTable = new Statuses();
// $commentsTable = new Comments();

// $users = [];
// $status = [];

// for ($i = 0; $i < 50; $i++) {
//     $rand = rand(0, 1);
//     if ($rand == 1) {
//         $avatar = "https://randomuser.me/api/portraits/men/$i.jpg";
//         $gender = "male";
//     } else {
//         $avatar = "https://randomuser.me/api/portraits/women/$i.jpg";
//         $gender = "female";
//     }


//     $userId = $usersTable->create(["firstName" => $faker->firstName($gender), "lastName" => $faker->lastName(), "email" => $faker->email(), "description" => $faker->text(), "avatar" => $avatar, "password" => password_hash("password", PASSWORD_DEFAULT)]);

//     $users[] .= $userId;

//     for ($j = 0; $j < mt_rand(1, 5); $j++) {
//         $statusId = $statusTable->create([
//             'createdAt' => $faker->dateTimeBetween('-6 months')->format('Y-m-d H:i:s'),
//             'content' => $faker->realText(),
//             'user_id' => $userId
//         ]);

//         $status[] .= $statusId;

//     }
// }

// foreach ($status as $statu) {
//     for ($i = 0; $i < mt_rand(2, 10); $i++) {
//         $commentsTable->create([
//             'status_id' => $statu,
//             'user_id' => $faker->randomElement($users),
//             'content' => $faker->sentence,
//             'createdAt' => $faker->dateTimeThisMonth->format('Y-m-d H:i:s')
//         ]);
//     }
// }
// exit;

?>