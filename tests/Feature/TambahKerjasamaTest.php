<?php

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\User;

class TambahKerjasamaTest extends TestCase
{
    use RefreshDatabase;

    public function testAdminCanAddKerjasama()
    {
        $response = $this->get('/');

        $response->assertRedirect('/login');

        // Create an admin user
        $admin = User::factory()->create(['role' => 'admin']);

        // Acting as the admin user
        $this->actingAs($admin);

        // Tidak termasuk middleware CSRF selama pengujian
        $this->withoutMiddleware(['web', 'csrf']);
        
            // Mock the request data
        $formData = [
            // Add your form data here based on the actual fields in your form
            'nomor_mou' => 'ABC123',
            'nomor_mou_instansi' => 'XYZ456',
            'nomor_instansi' => '789',
            'email_instansi' => 'example@example.com',
            'nama_instansi' => 'BUMN',
            'alamat_instansi' => 'Rogojampi',
            'nama_contact_person' => 'Aufa',
            'contact_person' => '081252013681',
            'jenis_kegiatan' => 'Kerja lapangan',
            'manfaat_kerjasama' => 'membangun koneksi',
            'implementasi_kerjasama' => 'PKL',
            'masukkan_prodi' => 'Teknik informatika',
            'masukkan_kategori' => 'BUMN',
            'hard_file' => 'Ada'

            // ... other fields ...
        ];

        // Send a POST request to the form submission endpoint
        $response = $this->post('/tambah-kerjasama', $formData);

        // Assert that the response has a successful status code
        $response->assertStatus(200);

        // Assert that the success message is present in the response
        $response->assertSee('Data Kerjasama berhasil ditambahkan');

        // Optionally, you can add more assertions based on your specific requirements
    }
}
