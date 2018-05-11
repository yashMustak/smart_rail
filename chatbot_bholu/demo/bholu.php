<?php 
require_once("../../app-includes/app-include.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
    <title>Javascript Chat Bot Demo</title>
    <style>
        .chat-bot{ width:100%; margin:0 auto; padding: 20px; background-color: #f8f8f8; border: 1px solid #ccc; box-shadow: 0 0 10px #999; line-height: 1.4em; font: 13px helvetica,arial,freesans,clean,sans-serif; color: black; }
		
        #demo input { padding: 8px; font-size: 14px; border: 1px solid #ddd; width: 400px; }
        .button {
            display: inline-block;
            background-color: darkcyan;
            color: #fff;
            padding: 8px;
            cursor: pointer;
            float: right;
        }
        #chatBotCommandDescription { display: none; margin-bottom: 20px; }
        input:focus { outline: none; }
        .chatBotChatEntry { display: none; }
		
		.kc_fab_main_btn{
		display:none;
		  background-color:#000000;
		  width:80px;
		  height:50px;
		  border-radius:25%;
		  background:#A9A9A9;
		  border:none;
		  outline:none;
		  color:#FFF;
		  font-size:30px;
		  box-shadow: 0 3px 6px rgba(0,0,0,0.16), 0 3px 6px rgba(0,0,0,0.23);
		  transition:.3s;  
		  -webkit-tap-highlight-color: rgba(0,0,0,0);
		  position:fixed;
		  bottom:0%;
		  right:0%;
		}
		.kc_fab_main_btn:focus {
		  transform:scale(1.1);
		  transform:rotate(45deg);
		  -ms-transform: rotate(45deg);
		  -webkit-transform: rotate(45deg);
		}
    </style>
</head>
<body>
<?php siteHeader(); ?>
<section class="index-section"><div class="index-box" style="padding:0px">
<script src="../js/chatbot.js"></script>
<link rel="stylesheet" type="text/css" href="/sih/css/main.css" />
<link rel="stylesheet" type="text/css" href="../css/chatbot.css" />

<div class="chat-bot">
    <div id="chatBotCommandDescription"></div>
    <input id="humanInput" type="text" placeholder="Say something" />

    <!--<div class="button" onclick="if (!ChatBot.playConversation(sampleConversation,4000)) {alert('conversation already running');};">Play sample conversation!</div>-->
    <div class="button" onclick="$('#chatBotCommandDescription').slideToggle();" style="margin-right:10px">What can I say?</div>

    <div style="clear: both;">&nbsp;</div>

    <div id="chatBot">
        <div id="chatBotThinkingIndicator"></div>
        <div id="chatBotHistory"></div>
    </div>
</div>
<button class="kc_fab_main_btn">Chat</button>


<script>
    var sampleConversation = [
        "Hi",
        "My name is Fry",
        "Where is China?",
        "What is the population of China?",
        "Bye"
    ];
    var config = {
        botName: 'Bholu',
        inputs: '#humanInput',
        inputCapabilityListing: true,
        engines: [ChatBot.Engines.duckduckgo()],
        addChatEntryCallback: function(entryDiv, text, origin) {
            entryDiv.delay(200).slideDown();
         }
    };
    ChatBot.init(config);
    ChatBot.setBotName("Bholu");
    ChatBot.addPattern("^hi$", "response", "Hi!! this is railway chatbot, How can we help?", undefined, "Say 'Hi' to be greeted back.");
    ChatBot.addPattern("^bye$", "response", "We hope this was helpfull for you!", undefined, "Say 'Bye' to end the conversation.");
	 //   ChatBot.addPattern("(what is the )?meaning of life", "response", "42", undefined, "Say 'What is the meaning of life' to get the answer.");
    ChatBot.addPattern("^what is an e-ticket", "response", "An E-ticket is a ticket that can be booked online.", undefined, "Say 'what is an e-ticket' to get the answer.");
	ChatBot.addPattern("^how many ticket can be booked at a time", "response", "Maximum 6 tickets can be booked at a time.", undefined, "Say 'how many ticket can be booked at a time' to get the answer.");
	ChatBot.addPattern("^what is rac", "response", "RAC stands for Reservation Against Cancellation. An RAC ticket can get you on train but it does not guarantee a berth. There's a chance that you could end up with just a seat.", undefined, "Say 'what is rac' to get the answer.");
	ChatBot.addPattern("^how to book tickets", "response", "Go to Home, Under Plan Your Journey enter your source station, destination station and date of journey and press Go.", undefined, "Say 'how to book tickets' to get the answer.");
	ChatBot.addPattern("^what is waiting list", "response", "If a ticket is in Waiting List then though currently you are not alloted a seat. But, if required number of cancellations are made the ticket gets can get confirmed and you will be alloted a seat.", undefined, "Say 'what is waiting list' to get the answer.");
	ChatBot.addPattern("^Time limit for ticket booking", "response", "upto chart preparation", undefined, "Say 'Time limit for ticket booking?' to get the answer.");
	ChatBot.addPattern("^can we change name", "response", "Yes - as per Name change rules of Railways", undefined, "Say 'can we change name' to get the answer.");
	ChatBot.addPattern("^Is Journey Alterations permissible", "response", "Yes - as per Journey Alteration rules of Railways", undefined, "Say 'Is Journey Alterations permissible' to get the answer.");
	ChatBot.addPattern("^mode of payments for e-ticket", "response", "You can Credit card, debit card and net-banking for booking.", undefined, "Say 'mode of payments for e-ticket' to get the answer.");
	ChatBot.addPattern("^how to contact railways", "response", "email - care@irctc.co.in<br>E-tickets - etickets@irctc.co.in<br>Customer Care No. 139<br>Toll Free Numbers - 1800 11 1139, 1800 11 1322, 1800 11 1321", undefined, "Say 'how to contact railways' to get the answer.");
	ChatBot.addPattern("^booking hours", "response", "12.20 am to 11.45 pm.", undefined, "Say 'booking hours' to get the answer.");
	ChatBot.addPattern("^What if I Lost my ticket", "response", "The ERS/VRM/SMS sent by IRCTC along with the ID proof in original would be verified by TTE with the name and PNR on the chart. If the passenger fails to produce/display ERS/VRM/SMS sent by IRCTC due to any eventuality (loss, discharged mobile/laptop, etc) but has the prescribed original proof of identity, a penalty of Rs. 50/- per ticket as applicable to such cases will be levied. The ticket checking staff on train/at station will give EFT for the same.", undefined, "Say 'What if I Lost my ticket' to get the answer.");
    ChatBot.addPattern("(?:my name is|I'm|I am) (.*)", "response", "hi $1, thanks for talking to me today", function (matches) {
        ChatBot.setHumanName(matches[1]);
    },"Say 'My name is [your name]' or 'I am [name]' to be called that by the bot");
   	ChatBot.addPattern("compute ([0-9]+) plus ([0-9]+)", "response", undefined, function (matches) {
        ChatBot.addChatEntry("That would be "+(1*matches[1]+1*matches[2])+".","bot");
    },"Say 'compute [number] plus [number]' to make the bot your math monkey");

</script>
</div></section>
<?php siteFooter(); ?>
</body>
</html>