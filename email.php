<?php 
$from_name = $from_name ?? "System Notifikasi";
$from_jabatan = $from_jabatan ?? "Admin";

$to_name = $to_name ?? "Team";
$to_jabatan = $to_jabatan ?? "Operation";
$tanggal = $tanggal ?? date("Y-m-d");

$subject = $subject ?? "Judul Pekerjaan";
$detail_desc = $detail_desc ?? "Detail Pekerjaan";
$link_issue = $link_issue ?? "";
?><table style="box-sizing:border-box;border-collapse:separate!important;width:100%;background-color:#fff" width="100%" bgcolor="#fff">
    <tbody>
        <tr>
            <td style="box-sizing:border-box;font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',Helvetica,Arial,sans-serif,'Apple Color Emoji','Segoe UI Emoji','Segoe UI Symbol';font-size:14px;vertical-align:top" valign="top"></td>
            <td style="box-sizing:border-box;font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',Helvetica,Arial,sans-serif,'Apple Color Emoji','Segoe UI Emoji','Segoe UI Symbol';font-size:14px;vertical-align:top;display:block;max-width:580px;width:580px;margin:0 auto;padding:24px" width="580" valign="top">
                <div style="box-sizing:border-box;display:block;max-width:580px;margin:0 auto">








                    <h1 style="color:#323232!important;font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',Helvetica,Arial,sans-serif,'Apple Color Emoji','Segoe UI Emoji','Segoe UI Symbol';font-weight:600;line-height:1.25;font-size:32px;margin:10px 0">
                        Notifikasi Penugasan Baru</h1>
                    <p style="font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',Helvetica,Arial,sans-serif,'Apple Color Emoji','Segoe UI Emoji','Segoe UI Symbol';font-size:21px;font-weight:300;line-height:1.25;color:#6a737d;margin:0 0 15px">
                        <strong style="color:#24292e">Pesan dari : <?= $from_name; ?> (<?= $from_jabatan; ?>)</strong><br><span style="white-space:nowrap">Dibuat pada tanggal : <strong style="color:#333"><?= $tanggalx; ?></strong></span>
                    </p>


                    <table style="box-sizing:border-box;border-collapse:separate!important;width:100%;border-bottom-width:1px;border-bottom-color:#eaecef;border-bottom-style:solid;padding-bottom:12px" width="100%" cellspacing="0" cellpadding="0">
                        <tbody>
                            <tr>
                                
                                <td style="box-sizing:border-box;font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',Helvetica,Arial,sans-serif,'Apple Color Emoji','Segoe UI Emoji','Segoe UI Symbol';font-size:14px">
                                    <h3 style="color:#24292e!important;font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',Helvetica,Arial,sans-serif,'Apple Color Emoji','Segoe UI Emoji','Segoe UI Symbol';font-weight:600;line-height:1.25;font-size:18px;margin:0">
                                        
                                    </h3>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <table style="box-sizing:border-box;border-collapse:separate!important;width:100%" width="100%">
                        <tbody>
                            <tr>
                                <td>
                                    <table style="box-sizing:border-box;border-collapse:separate!important;margin-top:6px;margin-bottom:32px;width:100%" width="100%">
                                        <tbody>
                                            <tr>
                                                <td style="box-sizing:border-box;font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',Helvetica,Arial,sans-serif,'Apple Color Emoji','Segoe UI Emoji','Segoe UI Symbol';font-size:14px;vertical-align:top" valign="top">
                                                    <table style="box-sizing:border-box;border-collapse:separate!important;width:100%" width="100%" cellpadding="0" cellspacing="0">
                                                        <tbody>
                                                            <tr>
                                                                <td width="30" valign="top" style="box-sizing:border-box;font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',Helvetica,Arial,sans-serif,'Apple Color Emoji','Segoe UI Emoji','Segoe UI Symbol';padding-right:6px;font-size:14px;vertical-align:top;text-align:right;padding-top:4px" align="right">
                                                                    <img src="https://ci6.googleusercontent.com/proxy/aXZ8HEYvtiA2bSiAYjCiC1mKcODJlUiITlKz72ID9LXsGdMaE_cSrnJuTWd-GQQmLuFVTzPSuAArCzyiMomjUIOnZ7WESs0_942K-1flQUqhIKMqmG4bPT5upjRpyQ=s0-d-e1-ft#https://github.githubassets.com/images/email/vulnerability/warning-icon.png" width="16" height="14" alt="Warning!" style="border-width:0" class="CToWUd" data-bit="iit">
                                                                </td>
                                                                <td valign="middle" style="box-sizing:border-box;font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',Helvetica,Arial,sans-serif,'Apple Color Emoji','Segoe UI Emoji','Segoe UI Symbol';font-size:14px;padding-bottom:6px">
                                                                    <h3 style="color:#24292e!important;font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',Helvetica,Arial,sans-serif,'Apple Color Emoji','Segoe UI Emoji','Segoe UI Symbol';font-weight:600;line-height:1.25;font-size:18px;margin:0">
                                                                        <span style="box-sizing:border-box;color:#0366d6;text-decoration:none"><?= $to_name ?> - <strong style="font-weight:700">(<?= $to_jabatan ?>)</strong></span>
                                                                    </h3>
                                                                    <p style="box-sizing:border-box;font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',Helvetica,Arial,sans-serif,'Apple Color Emoji','Segoe UI Emoji','Segoe UI Symbol';font-size:14px;font-weight:700;color:#24292e;margin:6px 0 12px"><?= $subject; ?> - Status Open</p>

                                                                    <table style="border-top-width:1px;border-top-color:#eaecef;border-top-style:solid;box-sizing:border-box;border-collapse:separate!important;width:100%" width="100%" cellpadding="0" cellspacing="0">
                                                                        <tbody>
                                                                            <tr>
                                                                                <td valign="middle" style="box-sizing:border-box;font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',Helvetica,Arial,sans-serif,'Apple Color Emoji','Segoe UI Emoji','Segoe UI Symbol';font-size:14px;color:#24292e!important;padding-top:6px">

                                                                                    <table cellpadding="0" cellspacing="0" style="box-sizing:border-box;border-collapse:separate!important;width:100%;border-bottom-width:1px;border-bottom-color:#eaecef;border-bottom-style:solid;margin-bottom:9px;margin-top:6px" width="100%">
                                                                                        <tbody>
                                                                                            <tr>
                                                                                                <td style="box-sizing:border-box;font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',Helvetica,Arial,sans-serif,'Apple Color Emoji','Segoe UI Emoji','Segoe UI Symbol';font-size:14px;vertical-align:top" valign="top">
                                                                                                    <table cellpadding="0" cellspacing="0" style="box-sizing:border-box;border-collapse:separate!important;width:100%" width="100%">
                                                                                                        <tbody>
                                                                                                            <tr>
                                                                                                                <td>
                                                                                                                    <table cellpadding="0" cellspacing="0" style="box-sizing:border-box;border-collapse:separate!important;width:100%;table-layout:fixed" width="100%">
                                                                                                                        <tbody>
                                                                                                                            
                                                                                                                            <tr>
                                                                                                                                <td colspan="3" style="box-sizing:border-box;font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',Helvetica,Arial,sans-serif,'Apple Color Emoji','Segoe UI Emoji','Segoe UI Symbol';font-size:14px;vertical-align:top;padding-bottom:9px;padding-top:12px" valign="top">
                                                                                                                                    <span style="display:block;font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',Helvetica,Arial,sans-serif,'Apple Color Emoji','Segoe UI Emoji','Segoe UI Symbol';font-size:12px;color:#6a737d">Rincian Pekerjaan : <br></span>
                                                                                                                                    <span style="word-break:break-word;word-wrap:break-word;font-family:'SFMono-Regular',Consolas,'Liberation Mono',Menlo,Courier,monospace;font-size:13px;font-weight:600!important;white-space:normal"><?= $detail_desc; ?></span>
                                                                                                                                </td>
                                                                                                                            </tr>
                                                                                                                            
                                                                                                                        </tbody>
                                                                                                                    </table>
                                                                                                                </td>
                                                                                                            </tr>

                                                                                                        </tbody>
                                                                                                    </table>
                                                                                                </td>
                                                                                            </tr>
                                                                                        </tbody>
                                                                                    </table>

                                                                                </td>
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td></td>
                                                                <td>
                                                                    <table style="box-sizing:border-box;border-collapse:separate!important;width:330px;margin-bottom:12px" cellspacing="0" cellpadding="0">
                                                                        <tbody>
                                                                            <tr>
                                                                                <td style="box-sizing:border-box;font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',Helvetica,Arial,sans-serif,'Apple Color Emoji','Segoe UI Emoji','Segoe UI Symbol';font-size:14px;vertical-align:top;background-color:#0366d6;border-radius:5px;text-align:center" valign="top" bgcolor="#0366d6" align="center">
                                                                                    <a href="<?= $link_issue; ?>" style="box-sizing:border-box;text-decoration:none;background-color:#0366d6;border-radius:5px;color:#ffffff;display:inline-block;font-size:14px;font-weight:bold;margin:0;padding:10px 20px;border:1px solid #0366d6" target="_blank" data-saferedirecturl="https://www.google.com/url?q=<?= $link_issue; ?>">Lihat Detail Tiket Instruksi</a>
                                                                                </td>
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                        </tbody>
                    </table>





                    


                </div>

            </td>
        </tr>
    </tbody>
</table>