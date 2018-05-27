<?php
$mailbox = imap_open("{imap.1and1.co.uk:993/imap/ssl}INBOX", "josh@blogdotexe.co.uk", "Jbmerhei!");
$msg = imap_check($mailbox);
echo @imap_qprint(imap_body($mailbox, imap_num_msg($mailbox)));
@imap_close($mailbox);
?>