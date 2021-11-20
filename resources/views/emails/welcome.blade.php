<html lang="ru">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<title>One Letter</title>

	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>

	<style>
		.ReadMsgBody {width: 100%; background-color: #ffffff;}
		.ExternalClass {width: 100%; background-color: #ffffff;}

				/* Windows Phone Viewport Fix */
		@-ms-viewport { 
		    width: device-width; 
		}
	</style>

	<!--[if (gte mso 9)|(IE)]>
	    <style type="text/css">
	        table {border-collapse: collapse;}
	        .mso {display:block !important;} 
	    </style>
	<![endif]-->

</head>
<body leftmargin="0" topmargin="0" marginwidth="0" marginheight="0" style="background: #e7e7e7; width: 100%; height: 100%; margin: 0; padding: 0;">
	<!-- Mail.ru Wrapper -->
	<div id="mailsub">
		<!-- Wrapper -->
		<center class="wrapper" style="table-layout: fixed; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; padding: 0; margin: 0 auto; width: 100%; max-width: 960px;">
			<!-- Old wrap -->
	        <div class="webkit">
				<table cellpadding="0" cellspacing="0" border="0" bgcolor="#ffffff" style="padding: 0; margin: 0 auto; width: 100%; max-width: 960px;">
					<tbody>
						<tr>
							<td align="center">

								<!-- Start Section (1 column) -->
								<table id="intro" cellpadding="0" cellspacing="0" border="0" bgcolor="#4F6331" align="center" style="width: 100%; padding: 0; margin: 0; background-size: auto 102%; background-position: center center; background-repeat: no-repeat; background-color: #252525">
									<tbody >
										<tr><td colspan="3" height="100"></td></tr>
										<!-- Main Title -->
										<tr>
											<td colspan="3" height="60" align="center">
												<div border="0" style="border: none; line-height: 60px; color: #ffffff; font-family: Verdana, Geneva, sans-serif; font-size: 22px; font-weight: 400;">
													Рады Вас приветствовать, {{ucfirst($user->name)}}!
												</div>
											</td>
										</tr>
										<!-- Line 1 -->
										<tr>
											<td colspan="3" height="20" valign="bottom" align="center">
												<img src="https://github.com/lime7/responsive-html-template/blob/master/index/line-1.png?raw=true" alt="line" border="0" width="464" height="5" style="border: none; outline: none; max-width: 600px; width: 100%; -ms-interpolation-mode: bicubic;" >
											</td>
										</tr>
										<!-- Meta title -->
										<tr>
											<td colspan="3">
												<table cellpadding="0" cellspacing="0" border="0" align="center" style="padding: 0; padding-top:30px; margin: 0; width: 100%;">
													<tbody>
														<tr>
															<td width="90" style="width: 9%;"></td>
															<td align="center">
																<div border="0" style="border: none; height: 60px;">
																	<p style="font-size: 19px; text-align: center;font-weight:300!important; color: rgba(255,255,255,.8);">
																		Добро пожаловать в 
																		<span style="color:teal; font-size:20px; font-weight:400;">
																			{{ config('app.full_domain') }}
																		</span>. 
																		Спасибо, что Вы выбрали
		      															нашу платформу на криптовалютном рынке.
																	</p>
																</div>
															</td>
															<td width="90" style="width: 9%;"></td>
														</tr>
													</tbody>
												</table>
											</td>
										</tr>
										<!-- Meta title -->
										<tr>
											<td colspan="3">
												<table cellpadding="0" cellspacing="0" border="0" align="center" style="padding: 0; padding-top:30px; margin: 0; width: 100%;">
													<tbody>
														<tr>
															<td width="90" style="width: 9%;"></td>
															<td align="center">
																<div border="0" style="border: none; height: 60px;">
																	<p style="font-size: 19px; text-align: center;font-weight:300!important; color: rgba(255,255,255,.8);">
																		<em><small>

																		Появились вопросы?<br>
																		Обратитесь к нашей тех поддержке: 
																		<span style="color:teal; font-size:20px; font-weight:400;">
																			<a href="mailto:{{ config('app.email') }}" style="color:#30B1EA!important; text-decoration:none;">
																			<small>
																				{{ config('app.full_domain') }}
																			</small>
																			</a>
																		</span>
																		в любое время суток.

																		</small></em>
																	</p>
																</div>
															</td>
															<td width="90" style="width: 9%;"></td>
														</tr>
													</tbody>
												</table>
											</td>
										</tr>

										<tr><td colspan="3" height="40"></td></tr>
										<tr>
											<td width="330"></td>
											<!-- Button Start -->
											<td width="300" align="center" height="52">
												<div style="	background-size: 100% 100%; background-position: center center; width: 225px;">
													<a href="{{ route('crypto') }}" target="_blank" border="0" bgcolor="#009789" style="border: none; outline: none; display: block; width:260px; height: 40px; text-decoration: none; font-size: 17px; line-height: 40px; color: #ffffff; font-family: Verdana, Geneva, sans-serif; text-align: center; background-color: teal;  -webkit-text-size-adjust:none; border-radius:5px;">
														Начать зарабатывать
													</a>
												</div>
											</td>
											<td width="330"></td>
										</tr>
										<tr><td colspan="3" height="85"></td></tr>
									</tbody>
								</table><!-- End Start Section -->
								
							</td>
						</tr>
					</tbody>
				</table>
			</div> <!-- End Old wrap -->
		</center> <!-- End Wrapper -->
	</div> <!-- End Mail.ru Wrapper -->
</body>

</html>