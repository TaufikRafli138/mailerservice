<?php
namespace App\Http\Controllers;

use App\Mail\MailCandidate;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Response;

class AvenueMailController extends Controller
{
    public function mailFanLetter(Request $request)
    {
        $from = $request->input('from');
        $email = $request->input('email');
        $phoneNumber = $request->input('phoneNumber');
        $socialMedia = $request->input('socialMedia');
        $whereAreYouFrom = $request->input('whereAreYouFrom');
        $avenueMember = $request->input('avenueMember');
        $avenueMemberMail = $request->input('avenueMemberMail');
        $message = $request->input('message');

        $myBodyEmail = '
        <p>Halo ' . $avenueMember . ',</p>
        <p>Kamu mendapatkan Fan Letter dari dari fan kamu berikut detail fan letternya, semoga dapat membuat kamu lebih semangat untuk kedepannya</p>
        <p>Harap perhatikan isi dari Fan Letter, jika ada kata-kata yang kurang pantas atau ujaran kebencian.</P>
        <p>Kamu diharapkan untuk melapor ke pihak management, Semangat terus ' . $avenueMember . ' !! <p> <br>
        <p> Berikut Adalah Fan Letter dari Fansmu : </p>

        <div class="sec_sp_sec">
            <div class="d-flex align-items-center">
                <div>
                <h1 class="display-4 mb-4">Fan Letter</h1>

                <div style="text-align:left">
                    <div style="background-color:#EEEEEE;color:grey;padding: 20px;">
                        <br><p style="margin-top:20px;">' . $message . '</p><br>
                        <br>
                    </div>
                </div>
              
                <p> From : ' . $from . ' </p>
                <p> Email : ' . $email . ' </p>
                <p> Phone Number : ' . $phoneNumber . ' </p>
                <p> Social Media : ' . $socialMedia . ' </p>
                <p> Organization : ' . $whereAreYouFrom . ' </p>
                </div>
            </div>
        </div>
        ';

        $subject = 'Hai, ' . $avenueMember . '. Ada Fan Letter Baru !!';
        $body = $myBodyEmail;

        $data = [
            'view' => 'email-notifications.fan-letter',
            'heading' => 'New Fan Letter For You !!',
        ];

        Mail::to($avenueMemberMail)->send(new MailCandidate($subject, $body, $data));
    }


    public function mailToFans(Request $request)
    {
        $from = $request->input('from');
        $email = $request->input('email');
        $avenueMember = $request->input('avenueMember');


        $myBodyEmail = '
        <p>Halo Kak ' . $from . ',</p>
        <p>Kami merasa sangat beruntung atas kiriman Fan Letter yang luar biasa ini. Surat Anda akan menjadi sumber inspirasi yang tak ternilai bagi ' . $avenueMember . ', dan fan letter ini telah diterima langsung oleh member yang bersangkutan.</p>
        <p>Setiap kata, saran, dan dukungan yang Anda berikan memainkan peran penting dalam memberikan semangat kepada ' . $avenueMember . '. Dengan dedikasi Anda, kami yakin mereka akan terus berkembang dan memberikan yang terbaik dari diri mereka. Selain itu, kami ingin menyampaikan terima kasih atas dedikasi Anda sebagai penggemar setia ' . $avenueMember . '. Dukungan Anda adalah energi yang mendorong mereka untuk terus berprestasi dan memberikan kebahagiaan kepada banyak orang.</p>
        <p>Teruslah mendukung ' . $avenueMember . ' dengan cinta dan semangat yang sama seperti yang telah Anda tunjukkan. Bersama-sama, kita akan menciptakan momen-momen yang tak terlupakan dalam perjalanan musik mereka.</P>
        <hr>
        <p>Salam hormat,</p>
        <p>Tim Manajemen Avenue J</p>
        ';

        $subject = 'Hai, kak ' . $from . '. Terima Kasih Atas Suratnya!!';
        $body = $myBodyEmail;

        $data = [
            'view' => 'email-notifications.fan-letter',
            'heading' => 'Terima kasih Kak Atas Suratnya !!',
        ];

        Mail::to($email)->send(new MailCandidate($subject, $body, $data));
    }

    public function mailToManagement(Request $request)
    {
        $from = $request->input('from');
        $message = $request->input('message');
        $email = $request->input('email');

        $myBodyEmail = '
        <p>Halo Aveneu Management Team !!,</p>
        <p>Kamu mendapatkan Message baru </p>
        <p> Berikut Adalah messagenya: </p>
        <div class="sec_sp_sec">
        <div class="d-flex align-items-center">
            <div>
                <div style="text-align:left">
                    <div style="background-color:#EEEEEE;color:grey;padding: 20px;">
                        <br><p style="margin-top:20px;">' . $message . '</p><br>
                        <br>
                    </div>
                    
                <p> From : ' . $from . ' </p>
                <p> Email : ' . $email . ' </p>
                </div>
            </div>
        </div>
        ';

        $subject = 'Ada Email Baru dari ' . $from . '!!';
        $body = $myBodyEmail;

        $data = [
            'view' => 'email-notifications.fan-letter',
            'heading' => 'Ada Email Baru!!',
        ];

        Mail::to("taufikcahyo45@gmail.com")->send(new MailCandidate($subject, $body, $data));
    }

    public function mailToSender(Request $request)
    {
        $from = $request->input('from');
        $email = $request->input('email');
        $myBodyEmail = '
        <p>Halo Kak ' . $from . ',</p>
        
        <p>Kami ingin menyampaikan terima kasih yang tulus atas pesan yang Anda kirimkan kepada kami melalui formulir "Contact Us". Pesan Anda sangat berarti bagi kami dan kami sangat menghargainya.</p>
        
        <p>Tim manajemen kami telah menerima pesan Anda dan saat ini sedang memprosesnya dengan seksama. Setiap tanggapan, pertanyaan, atau masukan dari pengunjung seperti Anda sangat penting bagi kami dalam upaya kami untuk terus meningkatkan layanan kami.</p>
        
        <p>Silakan bersiap untuk menerima balasan dari tim admin kami segera. Kami memastikan bahwa setiap pesan akan direspon dengan penuh perhatian dan dalam waktu yang sesingkat mungkin.</p>
        
        <p>Sementara itu, jika Anda memiliki kebutuhan mendesak atau pertanyaan tambahan, jangan ragu untuk menghubungi kami melalui email ini atau melalui kontak lain yang tercantum di situs web kami. Kami selalu siap membantu Anda dengan segala yang Anda butuhkan.</p>
        
        <p>Terima kasih sekali lagi atas kesabaran dan pengertian Anda. Kami berkomitmen untuk memberikan pengalaman pelanggan yang luar biasa dan kami berharap dapat memenuhi harapan Anda.</p>
        
        <p>Terima kasih dan salam hormat,</p>
        <p>Tim Manajemen Avenue-J Tasikmalaya</p>
        ';


        $subject = 'Hai, kak ' . $from . '. Terima Kasih telah menghubungi Avenue J !!';
        $body = $myBodyEmail;

        $data = [
            'view' => 'email-notifications.fan-letter',
            'heading' => 'Terima Kasih telah menghubungi Avenue J !!',
        ];

        Mail::to($email)->send(new MailCandidate($subject, $body, $data));
    }

    public function sendFanLetter(Request $request)
    {
        $this->mailFanLetter($request);
        $this->mailToFans($request);
        return response()->json(['message' => 'Fan letter processed successfully']);
    }
    public function sendAboutUS(Request $request)
    {
        $this->mailToManagement($request);
        $this->mailToSender($request);
        return response()->json(['message' => 'About Us processed successfully']);
    }

    public function testing(Request $request)
    {
        return response()->json([
            'success' => true,
            'message' => 'Succesfully Connected !!',
            'server' => 'Avenue-J Mailer Service',

        ], Response::HTTP_OK);
    }
}
