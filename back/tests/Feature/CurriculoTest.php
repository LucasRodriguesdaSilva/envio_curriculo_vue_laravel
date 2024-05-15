<?php

namespace Tests\Feature;

use App\Mail\EnviarCurriculoRh;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class CurriculoTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    private $dados;
    private $file;
    private $endereco_email = 'destinatario@example.com';

    /**
     * A basic feature test example.
     */
    public function test_hello_world_api(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    protected function setUp(): void 
    {
        parent::setUp();

        Storage::fake('curriculos');
        Mail::fake();

        $this->file = UploadedFile::fake()
                                ->create(
                                    'teste_curriculo.pdf', 
                                    1000, 
                                    'application/pdf'
                                );

        $this->dados = [
            'candidato' => $this->faker->name,
            'email' => $this->faker->unique()->safeEmail,
            'telefone' => $this->faker->phoneNumber,
            'cargo' => $this->faker->jobTitle,
            'escolaridade' => $this->faker->randomElement(['Ensino Médio', 'Ensino Superior']),
            'obs' => $this->faker->text,
            'nome_anexo' => 'curriculo.pdf',
            'curriculo' => $this->file
        ];

    }

    public function test_cadastro_curriculo(): void 
    {

        $response = $this->postJson('/api/curriculo/cadastrar', $this->dados);
 
        $response->assertStatus(200)
                 ->assertJson(['success']);
    
    }

    public function teste_verifica_anexo_salvo_no_disco(): void
    {
        $this->postJson('/api/curriculo/cadastrar', $this->dados);

        Storage::disk('curriculos')->assertExists($this->file->hashName());

    }

    public function test_verifica_envio_email_curriculo(): void
    {
        $this->postJson('/api/curriculo/cadastrar', $this->dados);

        Mail::assertSent(EnviarCurriculoRh::class, function ($mail) {
            return $mail->hasTo($this->endereco_email);
        });

    }

    public function test_verifica_dados_salvo_banco_dados(): void
    {
        $this->postJson('/api/curriculo/cadastrar', $this->dados);

        $this->assertDatabaseHas('curriculos', [
            'caminho_anexo' => 'curriculos/' . $this->file->hashName(),
            'candidato' => $this->dados['candidato'],
            'email' => $this->dados['email'],
            'telefone' => $this->dados['telefone'],
            'cargo' => $this->dados['cargo'],
            'escolaridade' => $this->dados['escolaridade'],
            'nome_anexo' => $this->dados['nome_anexo'],
            'nome_anexo' => $this->dados['nome_anexo'],
        ]);
        
    }

}
