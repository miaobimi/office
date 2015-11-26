<?php if (!defined('THINK_PATH')) exit();?><html>
  <head>
    <title>跳转......</title>
    <meta http-equiv="content-Type" content="text/html; charset=gb2312" />
  </head>
  <body>
    <form action="<?php echo ($form_url); ?>" method="post" id="frm1">
      <input type="hidden" name="MerCode" value="<?php echo ($Mer_code); ?>">
      <input type="hidden" name="MerOrderNo" value="<?php echo ($BillNo); ?>">
      <input type="hidden" name="Amount" value="<?php echo ($Amount); ?>" >
      <input type="hidden" name="OrderDate" value="<?php echo ($Date); ?>">
      <input type="hidden" name="Currency" value="<?php echo ($Currency_Type); ?>">
      <input type="hidden" name="GatewayType" value="<?php echo ($Gateway_Type); ?>">
      <input type="hidden" name="Language" value="<?php echo ($Lang); ?>">
      <input type="hidden" name="ReturnUrl" value="<?php echo ($Merchanturl); ?>">
      <input type="hidden" name="GoodsInfo" value="<?php echo ($Attach); ?>">
      <input type="hidden" name="OrderEncodeType" value="<?php echo ($OrderEncodeType); ?>">
      <input type="hidden" name="RetEncodeType" value="<?php echo ($RetEncodeType); ?>">
      <input type="hidden" name="Rettype" value="<?php echo ($Rettype); ?>">
      <input type="hidden" name="ServerUrl" value="<?php echo ($ServerUrl); ?>">
      <input type="hidden" name="SignMD5" value="<?php echo ($SignMD5); ?>">
      <input type="hidden" name="Bank_Code" value="00123">
    </form>
    <script language="javascript">
      document.getElementById("frm1").submit();
    </script>
  </body>
</html>