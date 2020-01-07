<!DOCTYPE html>
<html>
<head>
  <title>Pusher Test</title>
<script type="text/javascript" src="https://cdn.applozic.com/applozic/applozic.chat-5.7.1.min.js"></script>
</head>
<body>



  <script type="text/javascript">
  window.applozic.init({
    appId:'e52d1c297b0110f7eb058a30c8e6beaf',      //Get your App ID from https://console.applozic.com/settings/install
    userId: 'user67',                     //Logged in user's id, a unique identifier for user
  accessToken: '',                              //Enter password here for the userId passed above, read this if you want to add additional security by verifying password from your server https://www.applozic.com/docs/configuration.html#access-token-url
    userName: 'Jemis Goti,                 //User's display name
    imageLink : '',                     //User's profile picture url
    email : '',                         //optional
    contactNumber: '',                  //optional, pass with internationl code eg: +13109097458
    desktopNotification: true,
    source: '1',                          // optional, WEB(1),DESKTOP_BROWSER(5), MOBILE_BROWSER(6)
    notificationIconLink: 'https://www.applozic.com/favicon.ico',    //Icon to show in desktop notification, replace with your icon
    authenticationTypeId: 1,          //1 for password verification from Applozic server and 0 for access Token verification from your server
    locShare: true,                     //to enable location sharing
    googleApiKey: "AIzaSyDKfWHzu9X7Z2hByeW4RRFJrD9SizOzZt4",   // your project google api key
        unreadCountOnchatLauncher: true, // if true, will show unread count on chat widget
    googleMapScriptLoaded : false,   // true if your app already loaded google maps script
    mapStaticAPIkey: "AIzaSyCWRScTDtbt8tlXDr6hiceCsU83aS2UuZw",
    autoTypeSearchEnabled : true,     // set to false if you don't want to allow sending message to user who is not in the contact list
    loadOwnContacts : false, //set to true if you want to populate your own contact list (see Step 4 for reference)
    olStatus: false,         //set to true for displaying a green dot in chat screen for users who are online
    onInit : function(response,data) {
       if (response === "success") {
          // login successful, perform your actions if any, for example: load contacts, getting unread message count, etc
       } else {
          // error in user login/register (you can hide chat button or refresh page)
       }
   },
   contactDisplayName: function(otherUserId) {
         //return the display name of the user from your application code based on userId.
         return "";
   },
   contactDisplayImage: function(otherUserId) {
         //return the display image url of the user from your application code based on userId.
         return "";
   },
   onTabClicked: function(response) {
         // write your logic to execute task on tab load
         //   object response =  {
         //    tabId : userId or groupId,
         //    isGroup : 'tab is group or not'
         //  }
   }
  });
  var events = {
    'onConnectFailed': function(resp) {},
    'onConnect': function(resp) {},
    'onMessageDelivered': function(resp) {},
    'onMessageRead': function(resp) {
      //called when a message is read by the receiver 
    },
    'onMessageDeleted': function(resp) {},
    'onConversationDeleted': function(resp) {},
    'onUserConnect': function(resp) {},
    'onUserDisconnect': function(resp) {},
    'onConversationReadFromOtherSource': function(resp) {},
    'onConversationRead': function(resp) {
      //called when the conversation thread is read by the receiver
    },
    'onMessageReceived': function(resp) {
      //called when a new message is received
    },
    'onMessageSentUpdate': function(resp) {},
    'onMessageSent': function(resp) {
      //called when the message is sent
    },
    'onUserBlocked': function(resp) {},
    'onUserUnblocked': function(resp) {},
    'onUserActivated': function(resp) {},
    'onUserDeactivated': function(resp) {},
    'connectToSocket': function(resp) {},
    'onMessage': function(resp) { 
      
      console.log(resp); 
      
      //called when the websocket receive the data
    
    },
    'onTypingStatus': function(resp) {}
};
      
Applozic.ALApiService.login(
  {
    data: {
      baseUrl: 'https://apps.applozic.com',
      alUser:
      {
        userId: userId, //Logged in user's id, a unique identifier for user
        password: '',//Enter password here for the userId passed above, read this if you want to add additional security by verifying password from your server https://www.applozic.com/docs/configuration.html#access-token-url
        imageLink: '', //User's profile picture url
        email: '', //optional
        contactNumber: '', //optional, pass with internationl code eg: +13109097458
        appVersionCode: 108,
        applicationId: '<App_ID>', //Get your App ID from [Applozic Dashboard](https://console.applozic.com/settings/install)
      }
    },
    success: function(response) {
      console.log(response);
      var data = {};
      data.token = response.token;
      data.deviceKey = response.deviceKey;
      data.websocketUrl = response.websocketUrl;
      //Get your App ID from [Applozic Dashboard](https://console.applozic.com/settings/install)
      window.Applozic.ALSocket.init(<App_ID>, data, events);
      // This method initializes socket connection 
    },
    error: function() {
    
    }
  }
);
</script>

</body></html>