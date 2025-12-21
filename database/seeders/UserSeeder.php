public function run(): void
{
    User::create([
        'name' => '田中 太郎',
        'email' => 'tanaka@example.com',
        'password' => Hash::make('password'),
        'phone' => '090-1111-2222',
        'group_id' => 1,
        'role' => 1, // ここを追加！ (もしエラーが出たら 'user' に書き換えてみてください)
    ]);

    User::create([
        'name' => '佐藤 花子',
        'email' => 'sato@example.com',
        'password' => Hash::make('password'),
        'phone' => '080-3333-4444',
        'group_id' => 4,
        'role' => 1, // ここを追加！
    ]);
}