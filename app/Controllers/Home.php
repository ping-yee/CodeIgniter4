<?php

/**
 * This file is part of CodeIgniter 4 framework.
 *
 * (c) CodeIgniter Foundation <admin@codeigniter.com>
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        $requestData = [
            'contacts' => [
                'friends' => [
                    ['name' => 'Fred Flinstone', 'age' => 20],
                    ['age' => 21], // 'name' key does not exist
                ],
            ],
        ];

        // $requestData['contacts']['friends'][1]['name'] ??= null; // Workaround for non existing keys

        $this->validator = \Config\Services::validation();
        $this->validator->setRules(
            [
                'contacts.friends.*.name' => 'max_length[30]|required', // The "*" does not check for non existing keys and pass validation
                // 'contacts.friends.*.age' => 'required', // The "*" does not check for non existing keys and pass validation
                // 'contacts.friends.0.name' => 'required', // With this solution works fine even if the key does not exist
                // 'contacts.friends.1.name' => 'required', // With this solution works fine even if the key does not exist
            ]
        );

        dd($this->validator->run($requestData), $this->validator->getErrors());
    }
}
