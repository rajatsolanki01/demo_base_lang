
<table width="100%" border="0" cellspacing="0" cellpadding="0" align="center">
  <tr>
    <td colspan="3">&nbsp;</td>
  </tr>
  <tr>
    <td width="5%">&nbsp;</td>
    <td><table width="100%" border="0" cellspacing="5" cellpadding="0" align="center" style="border:#000000 1px solid;">
        <tr>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td class="nor_frm_name">{$clientDetail[0].frm_name}</td>
        </tr>
        <tr>
          <td><table width="97%" border="0"  class="left_detail" >
              <tr>
                <td class="text_bold" width="15%"> City </td>
                <td>&nbsp;:&nbsp;</td>
                <td> {$clientDetail[0].city} </td>
              </tr>
              <tr>
                <td class="text_bold">State</td>
                <td>&nbsp;:&nbsp;</td>
                <td> {$clientDetail[0].state} </td>
              </tr>
              <tr>
                <td class="text_bold" >Address</td>
                <td>&nbsp;:&nbsp;</td>
                <td> {$clientDetail[0].address} </td>
              </tr>
              <tr>
                <td class="text_bold" >Website</td>
                <td>&nbsp;:&nbsp;</td>
                <td class="site_link"><a href="http://{$clientDetail[0].site_url}" target="_blank">{$clientDetail[0].site_url}</a></td>
              </tr>
              <tr>
                <td class="text_bold" >Description</td>
                <td>&nbsp;:&nbsp;</td>
                <td> {$clientDetail[0].detail}</td>
              </tr>
              <tr>
                <td class="text_bold" >Category</td>
                <td>&nbsp;:&nbsp;</td>
                <td> {$category->client_cat($clientDetail[0].id)} </td>
              </tr>
              <tr>
                <td class="text_bold" >Logo</td>
                <td>&nbsp;:&nbsp;</td>
               
                {if $clientDetail[0].logo!=''}
                       <td><img src="{$site_url}/user_logo/{$clientDetail[0].logo}" width="80" height="80"  /></td>
                 {else} 
                  	 <td><img src="{$site_url}/templates/images/no_photo.jpeg" width="80" height="80"  /></td>
               {/if}  
              </tr>
            </table></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
        </tr>
      </table></td>
    <td width="5%">&nbsp;</td>
  </tr>
  <tr>
    <td width="5%">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="3"><table width="15%" border="0" cellspacing="0" cellpadding="0" align="center">
        <tr>
          <td class="butto"><a href="#" onclick="javascript:window.print(); return false" title="Print">Print</a></td>
          <td>&nbsp;</td>
          <td class="butto"><a href="#" onclick="window.close(); return false" title="Close">Close</a></td>
        </tr>
      </table></td>
  </tr>
</table>
