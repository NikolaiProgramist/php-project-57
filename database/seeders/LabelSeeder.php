<?php

namespace Database\Seeders;

use App\Models\Label;
use Illuminate\Database\Seeder;

class LabelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Label::create([
            'name' => 'безопасность',
            'description' => 'Thread hunting, Небезопасные места в коде, XSS, CSRF, XSRF, SQLi уязвимости.',
        ]);

        Label::create([
            'name' => 'документация',
            'description' => 'Примеры, Описания, Документация нового кода.',
        ]);

        Label::create([
            'name' => 'дизайн',
            'description' => 'Создание дизайна, UX, UI, Адаптация.',
        ]);

        Label::create([
            'name' => 'баг',
            'description' => 'Баги, Ошибки, Предупреждения, Исправление неожиданного поведения кода.',
        ]);
    }
}
