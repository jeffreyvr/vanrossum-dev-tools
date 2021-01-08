<div class='max-w-md mb-2'>
    <div class='flex border-b'>
        <div class='w-1/3 text-gray-500'>Subject</div>
        <div class='w-2/3'><?php echo $subject; ?></div>
    </div>
    <div class='flex border-b'>
        <div class='w-1/3 text-gray-500'>To</div>
        <div class='w-2/3'><?php echo $to; ?></div>
    </div>
    <div class='flex border-b'>
        <div class='w-1/3 text-gray-500'>Cc</div>
        <div class='w-2/3'><?php echo $cc; ?></div>
    </div>
    <div class='flex'>
        <div class='w-1/3 text-gray-500'>Bcc</div>
        <div class='w-2/3'><?php echo $bcc; ?></div>
    </div>
</div>

<div>
    <?php echo $body; ?>
</div>