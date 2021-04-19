<?php require_once('Conexion/Conexion.php'); ?>
<?php 
session_start();
if (!$_SESSION){
echo '<script language = javascript>
alert("usuario no autenticado")
self.location = "index.php"
</script>';
}
$CODIGO_USUARIO= $_SESSION['CODIGO_USUARIO'];
mysql_select_db($database_conn, $conn);
$query_registro = "select empleado.nombres, empleado.apellido_paterno from empleado, usuario where empleado.rut = usuario.rut and usuario.codigo_usuario = '".$CODIGO_USUARIO."'";
$result1 = mysql_query($query_registro, $conn) or die(mysql_error());
$numero = 0;

 while($row = mysql_fetch_array($result1))
  {
	$nombres = $row["nombres"];
	$apellido = $row["apellido_paterno"];
	$numero++;
  }
  
mysql_free_result($result1);

$RUT = $_GET['RUT'];
$BUSCAR_CODIGO = $_GET['buscar_codigo'];
$BUSCAR_NOMBRE = $_GET['buscar_nombre'];
$BUSCAR_AREA = $_GET['buscar_area'];
$txt_desde = $_GET["txt_desde"];
$txt_hasta = $_GET["txt_hasta"];

mysql_select_db($database_conn, $conn);
$query_registro = "SELECT * FROM HORAS_EXTRAS WHERE RUT ='".$RUT."'";
$result = mysql_query($query_registro, $conn) or die(mysql_error());
$numero = 0;

 while($row = mysql_fetch_array($result))
  {
	
  }
  mysql_free_result($result);

?>


<script type="text/javascript" src="js/jquery.min.js"></script>
  
  <script type="text/javascript" src="js/ordenDeCompra.js"></script>
  <script type="text/javascript" src="js/jquery-1.4.2.min.js"></script>
  <script type="text/javascript" src="js/jquery-ui-1.8.4.custom.min.js"></script>
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/x.x.x/jquery.min.js"></script>
  <script src="jquery.bpopup-x.x.x.min.js"></script>
  <link type="text/css" rel="stylesheet" href="Style/jquery-ui-1.8.4.custom.css" />
  <script src="js/jquery.ui.datepicker.js"></script>

<center>
<h4 style="color:#C3C">Ingresar</h4>
<form  id = 'formulario11' method="POST" action="scriptIngresarHora.php"/>
<table onMouseMove="fecha();">
<tr>
<td width="150">Fecha</td>
<td width="150" align="center"><input style=" width:157px;" type="text" id = 'fechai' name = "fechai"  value="<?php echo date("Y-m-d") ?>"> <br></td>
</tr>
<tr>
<td width="150">Dias laborales</td>
<td width="150" align="center"><input style=" width:157px;" type="text" id = 'diasl' name = "diasl"  value=""> <br></td>
</tr>
<tr>
<td width="150">Falta con aviso</td>
<td width="150" align="center"><input style=" width:157px;" type="text" id = 'diast' name = "diast"  value=""> <br></td>
</tr>
<tr>
<td width="150">Falta sin aviso</td>
<td width="150" align="center"><input style=" width:157px;" type="text" id = 'falts' name = "falts"  value=""> <br></td>
</tr>
<tr>
<td width="150">Hora extras</td>
<td width="150" align="center">H:
<select style=" width:50px;" type="text" id = 'he' name = "he">
<option>00</option>
<option>01</option>
<option>02</option>
<option>03</option>
<option>04</option>
<option>05</option>
<option>06</option>
<option>07</option>
<option>08</option>
<option>09</option>
<option>10</option>
<option>11</option>
<option>12</option>
<option>13</option>
<option>14</option>
<option>15</option>
<option>16</option>
<option>17</option>
<option>18</option>
<option>19</option>
<option>20</option>
<option>21</option>
<option>22</option>
<option>23</option>
<option>24</option>
<option>25</option>
<option>26</option>
<option>27</option>
<option>28</option>
<option>29</option>
<option>30</option>
<option>31</option>
<option>32</option>
<option>33</option>
<option>34</option>
<option>35</option>
<option>36</option>
<option>37</option>
<option>38</option>
<option>39</option>
<option>40</option>
<option>41</option>
<option>42</option>
<option>43</option>
<option>44</option>
<option>45</option>
<option>46</option>
<option>47</option>
<option>48</option>
<option>49</option>
<option>50</option>
<option>51</option>
<option>52</option>
<option>53</option>
<option>54</option>
<option>55</option>
<option>56</option>
<option>57</option>
<option>58</option>
<option>59</option>
<option>60</option>
<option>61</option>
<option>62</option>
<option>63</option>
<option>64</option>
<option>65</option>
<option>66</option>
<option>67</option>
<option>68</option>
<option>69</option>
<option>70</option>
<option>71</option>
<option>72</option>
<option>73</option>
<option>74</option>
<option>75</option>
<option>76</option>
<option>77</option>
<option>78</option>
<option>79</option>
<option>80</option>
<option>81</option>
<option>82</option>
<option>83</option>
<option>84</option>
<option>85</option>
<option>86</option>
<option>87</option>
<option>88</option>
<option>89</option>
<option>90</option>
<option>91</option>
<option>92</option>
<option>93</option>
<option>94</option>
<option>95</option>
<option>96</option>
<option>97</option>
<option>98</option>
<option>99</option>
<option>90</option>
<option>91</option>
<option>92</option>
<option>93</option>
<option>94</option>
<option>95</option>
<option>96</option>
<option>97</option>
<option>98</option>
<option>99</option>
<option>90</option>
<option>91</option>
<option>92</option>
<option>93</option>
<option>94</option>
<option>95</option>
<option>96</option>
<option>97</option>
<option>98</option>
<option>99</option>
<option>100</option>
<option>101</option>
<option>102</option>
<option>104</option>
<option>105</option>
<option>106</option>
<option>107</option>
<option>108</option>
<option>109</option>
<option>110</option>
<option>111</option>
<option>112</option>
<option>113</option>
<option>114</option>
<option>115</option>
<option>116</option>
<option>117</option>
<option>118</option>
<option>119</option>
<option>120</option>
<option>121</option>
<option>122</option>
<option>123</option>
<option>124</option>
<option>125</option>
<option>126</option>
<option>127</option>
<option>128</option>
<option>129</option>
<option>130</option>
<option>131</option>
<option>132</option>
<option>133</option>
<option>134</option>
<option>135</option>
<option>136</option>
<option>137</option>
<option>138</option>
<option>139</option>
<option>140</option>
<option>141</option>
<option>142</option>
<option>143</option>
<option>144</option>
<option>145</option>
<option>146</option>
<option>147</option>
<option>148</option>
<option>149</option>
<option>150</option>
<option>151</option>
<option>152</option>
<option>153</option>
<option>154</option>
<option>155</option>
<option>156</option>
<option>157</option>
<option>158</option>
<option>159</option>
<option>160</option>
<option>161</option>
<option>162</option>
<option>163</option>
<option>164</option>
<option>165</option>
<option>166</option>
<option>167</option>
<option>168</option>
<option>169</option>
<option>170</option>
<option>171</option>
<option>172</option>
<option>173</option>
<option>174</option>
<option>175</option>
<option>176</option>
<option>177</option>
<option>178</option>
<option>179</option>
<option>180</option>
<option>181</option>
<option>182</option>
<option>183</option>
<option>184</option>
<option>185</option>
<option>186</option>
<option>187</option>
<option>188</option>
<option>189</option>
<option>190</option>
<option>191</option>
<option>192</option>
<option>193</option>
<option>194</option>
<option>195</option>
<option>196</option>
<option>197</option>
<option>198</option>
<option>199</option>
<option>190</option>
<option>191</option>
<option>192</option>
<option>193</option>
<option>194</option>
<option>195</option>
<option>196</option>
<option>197</option>
<option>198</option>
<option>199</option>
<option>190</option>
<option>191</option>
<option>192</option>
<option>193</option>
<option>194</option>
<option>195</option>
<option>196</option>
<option>197</option>
<option>198</option>
<option>199</option>
<option>200</option>
</select>
M:
<select style=" width:50px;" type="text" id = 'he1' name = "he1">
<option>00</option>
<option>01</option>
<option>02</option>
<option>03</option>
<option>04</option>
<option>05</option>
<option>06</option>
<option>07</option>
<option>08</option>
<option>09</option>
<option>10</option>
<option>11</option>
<option>12</option>
<option>13</option>
<option>14</option>
<option>15</option>
<option>16</option>
<option>17</option>
<option>18</option>
<option>19</option>
<option>20</option>
<option>21</option>
<option>22</option>
<option>23</option>
<option>24</option>
<option>25</option>
<option>26</option>
<option>27</option>
<option>28</option>
<option>29</option>
<option>30</option>
<option>31</option>
<option>32</option>
<option>33</option>
<option>34</option>
<option>35</option>
<option>36</option>
<option>37</option>
<option>38</option>
<option>39</option>
<option>40</option>
<option>41</option>
<option>42</option>
<option>43</option>
<option>44</option>
<option>45</option>
<option>46</option>
<option>47</option>
<option>48</option>
<option>49</option>
<option>50</option>
<option>51</option>
<option>52</option>
<option>53</option>
<option>54</option>
<option>55</option>
<option>56</option>
<option>57</option>
<option>58</option>
<option>59</option>
</select>
 <br></td>
</tr>
<tr>
<td width="150">Hora Descuento</td>
<td width="150" align="center">H:
<select style=" width:50px;" type="text" id = 'hd' name = "hd">
<option>00</option>
<option>01</option>
<option>02</option>
<option>03</option>
<option>04</option>
<option>05</option>
<option>06</option>
<option>07</option>
<option>08</option>
<option>09</option>
<option>10</option>
<option>11</option>
<option>12</option>
<option>13</option>
<option>14</option>
<option>15</option>
<option>16</option>
<option>17</option>
<option>18</option>
<option>19</option>
<option>20</option>
<option>21</option>
<option>22</option>
<option>23</option>
<option>24</option>
<option>25</option>
<option>26</option>
<option>27</option>
<option>28</option>
<option>29</option>
<option>30</option>
<option>31</option>
<option>32</option>
<option>33</option>
<option>34</option>
<option>35</option>
<option>36</option>
<option>37</option>
<option>38</option>
<option>39</option>
<option>40</option>
<option>41</option>
<option>42</option>
<option>43</option>
<option>44</option>
<option>45</option>
<option>46</option>
<option>47</option>
<option>48</option>
<option>49</option>
<option>50</option>
<option>51</option>
<option>52</option>
<option>53</option>
<option>54</option>
<option>55</option>
<option>56</option>
<option>57</option>
<option>58</option>
<option>59</option>
<option>60</option>
<option>61</option>
<option>62</option>
<option>63</option>
<option>64</option>
<option>65</option>
<option>66</option>
<option>67</option>
<option>68</option>
<option>69</option>
<option>70</option>
<option>71</option>
<option>72</option>
<option>73</option>
<option>74</option>
<option>75</option>
<option>76</option>
<option>77</option>
<option>78</option>
<option>79</option>
<option>80</option>
<option>81</option>
<option>82</option>
<option>83</option>
<option>84</option>
<option>85</option>
<option>86</option>
<option>87</option>
<option>88</option>
<option>89</option>
<option>90</option>
<option>91</option>
<option>92</option>
<option>93</option>
<option>94</option>
<option>95</option>
<option>96</option>
<option>97</option>
<option>98</option>
<option>99</option>
<option>90</option>
<option>91</option>
<option>92</option>
<option>93</option>
<option>94</option>
<option>95</option>
<option>96</option>
<option>97</option>
<option>98</option>
<option>99</option>
<option>90</option>
<option>91</option>
<option>92</option>
<option>93</option>
<option>94</option>
<option>95</option>
<option>96</option>
<option>97</option>
<option>98</option>
<option>99</option>
<option>100</option>
<option>101</option>
<option>102</option>
<option>104</option>
<option>105</option>
<option>106</option>
<option>107</option>
<option>108</option>
<option>109</option>
<option>110</option>
<option>111</option>
<option>112</option>
<option>113</option>
<option>114</option>
<option>115</option>
<option>116</option>
<option>117</option>
<option>118</option>
<option>119</option>
<option>120</option>
<option>121</option>
<option>122</option>
<option>123</option>
<option>124</option>
<option>125</option>
<option>126</option>
<option>127</option>
<option>128</option>
<option>129</option>
<option>130</option>
<option>131</option>
<option>132</option>
<option>133</option>
<option>134</option>
<option>135</option>
<option>136</option>
<option>137</option>
<option>138</option>
<option>139</option>
<option>140</option>
<option>141</option>
<option>142</option>
<option>143</option>
<option>144</option>
<option>145</option>
<option>146</option>
<option>147</option>
<option>148</option>
<option>149</option>
<option>150</option>
<option>151</option>
<option>152</option>
<option>153</option>
<option>154</option>
<option>155</option>
<option>156</option>
<option>157</option>
<option>158</option>
<option>159</option>
<option>160</option>
<option>161</option>
<option>162</option>
<option>163</option>
<option>164</option>
<option>165</option>
<option>166</option>
<option>167</option>
<option>168</option>
<option>169</option>
<option>170</option>
<option>171</option>
<option>172</option>
<option>173</option>
<option>174</option>
<option>175</option>
<option>176</option>
<option>177</option>
<option>178</option>
<option>179</option>
<option>180</option>
<option>181</option>
<option>182</option>
<option>183</option>
<option>184</option>
<option>185</option>
<option>186</option>
<option>187</option>
<option>188</option>
<option>189</option>
<option>190</option>
<option>191</option>
<option>192</option>
<option>193</option>
<option>194</option>
<option>195</option>
<option>196</option>
<option>197</option>
<option>198</option>
<option>199</option>
<option>190</option>
<option>191</option>
<option>192</option>
<option>193</option>
<option>194</option>
<option>195</option>
<option>196</option>
<option>197</option>
<option>198</option>
<option>199</option>
<option>190</option>
<option>191</option>
<option>192</option>
<option>193</option>
<option>194</option>
<option>195</option>
<option>196</option>
<option>197</option>
<option>198</option>
<option>199</option>
<option>200</option>
</select>
M:
<select style=" width:50px;" type="text" id = 'hd1' name = "hd1">
<option>00</option>
<option>01</option>
<option>02</option>
<option>03</option>
<option>04</option>
<option>05</option>
<option>06</option>
<option>07</option>
<option>08</option>
<option>09</option>
<option>10</option>
<option>11</option>
<option>12</option>
<option>13</option>
<option>14</option>
<option>15</option>
<option>16</option>
<option>17</option>
<option>18</option>
<option>19</option>
<option>20</option>
<option>21</option>
<option>22</option>
<option>23</option>
<option>24</option>
<option>25</option>
<option>26</option>
<option>27</option>
<option>28</option>
<option>29</option>
<option>30</option>
<option>31</option>
<option>32</option>
<option>33</option>
<option>34</option>
<option>35</option>
<option>36</option>
<option>37</option>
<option>38</option>
<option>39</option>
<option>40</option>
<option>41</option>
<option>42</option>
<option>43</option>
<option>44</option>
<option>45</option>
<option>46</option>
<option>47</option>
<option>48</option>
<option>49</option>
<option>50</option>
<option>51</option>
<option>52</option>
<option>53</option>
<option>54</option>
<option>55</option>
<option>56</option>
<option>57</option>
<option>58</option>
<option>59</option>
</select>
 <br></td>
</tr>
<tr>
<td width="150">Colacion</td>
<td width="150" align="center"><input style=" width:157px;" type="text" id = 'colacion' name = "colacion"  value=""><input style="display:none;" type="text" name = "rut" value="<?php echo $RUT ?>"> <br></td>
</tr>
<tr>
<td width="150">Colacion extra</td>
<td width="150" align="center"><input style=" width:157px;" type="text" id = 'colacion_extra' name = "colacion_extra"  value=""> <br></td>
</tr>
<tr>
<td width="150">Locomocion</td>
<td width="150" align="center"><input style=" width:157px;" type="text" id = 'locomocion' name = "locomocion"  value=""> <br></td>
</tr>
<tr>
<td width="150">Locomocion extra</td>
<td width="150" align="center"><input style=" width:157px;" type="text" id = 'locomocion_extra' name = "locomocion_extra"  value=""> <br></td>
</tr>
<tr>
<tr>
<td width="150">Licencia</td>
<td width="150" align="center"><input style=" width:157px;" type="text" id = 'licencia' name = "licencia"  value=""> <br></td>
</tr>
<tr>
<td width="150">Vacaciones</td>
<td width="150" align="center"><input style=" width:157px;" type="text" id = 'vacaciones' name = "vacaciones"  value=""> <br></td>
</tr>
<tr>
<td width="150"></td>
<td width="150" align="center"><input style=" width:157px;" type="submit" id = 'enviar' name = "enviar"  value="Enviar"> <br></td>
</tr>
</table>
<input style="display:none;" type="text" autocomplete="off" id="buscar_codigo" name="buscar_codigo" value="<?php echo $BUSCAR_CODIGO  ?>" />
<input style="display:none;" type="text" autocomplete="off" id="buscar_nombre" name="buscar_nombre" value="<?php echo $BUSCAR_NOMBRE ?>"/>
<input style="display:none;" type="text" autocomplete="off" id="buscar_area" name="buscar_area" value = "<?php echo $BUSCAR_AREA ?>"/>
<input style="display:none;" type="text" autocomplete="off" id="txt_desde" name="txt_desde" value="<?php echo $txt_desde ?>"/>
<input style="display:none;" type="text" autocomplete="off" id="txt_hasta" name="txt_hasta" value="<?php echo $txt_hasta ?>"/>
</form>
</center>
<table style="background:#F9C;" rules="all">
<tr>
<th style='font-size:9px;color:#FFF;'>Laborales</th>
<th style='font-size:9px;color:#FFF;'>Trabajado</th>
<th style='font-size:9px;color:#FFF;'>Faltados c</th>
<th style='font-size:9px;color:#FFF;'>Faltados s</th>
<th style='font-size:9px;color:#FFF;'>Licensia</th>
<th style='font-size:9px;color:#FFF;'>Vacaciones</th>
<th style='font-size:9px;color:#FFF;'>Hora extras</th>
<th style='font-size:9px;color:#FFF;'>Hora descuentos</th>
<th style='font-size:9px;color:#FFF;'>Colacion</th>
<th style='font-size:9px;color:#FFF;'>Colacion extra</th>
<th style='font-size:9px;color:#FFF;'>Locomocion</th>
<th style='font-size:9px;color:#FFF;'>Locomocion Extra</th>
<th style='font-size:9px;color:#FFF;'>Fecha</th>
<th style='font-size:9px;color:#FFF;'>Eliminar</th>
</tr>
<?php
mysql_select_db($database_conn, $conn);
$query_registro = "select * from horas_extras where RUT = '".$RUT."' LIMIT 10";
$result1 = mysql_query($query_registro, $conn) or die(mysql_error());
$numero = 0;

 while($row = mysql_fetch_array($result1))
  {
	$FALTADO_C = $row["FALTADO_C"];
	$FALTADO_S = $row["FALTADO_S"];
	$COLACION = $row["COLACION"];
	$LOCOMOCION = $row["LOCOMOCION"];
	$LOCOMOCION_EXTRAS = $row["LOCOMOCION_EXTRAS"];
	$COLACIONES_EXTRAS = $row["COLACIONES_EXTRAS"];
	$LABORALES = $row["DIA_LABORALES"];
	$COD= $row["CODIGO_HORASE"];
	$FECHA= $row["FECHA"];
	$HORA_EXTRA= $row["HORA_EXTRA"];
	$HORA_DESCUENTO= $row["HORA_DESCUENTO"];
	$LICENCIA= $row["LICENCIA"];
    $VACACIONES= $row["VACACIONES"];

	$numero++;
	
	  if($LABORALES != "")
  {
  $RESTA = $LABORALES - $FALTADO_C - $FALTADO_S;
  }
  else
  {
  $RESTA = "";
  }

	echo " <tr> <td align='center' style='font-size:8px;color:#FFF;'> ".$LABORALES." </td>";
	echo " <td align='center'  style='font-size:8px;color:#FFF;'>".$RESTA." </td>";
	echo " <td align='center' style='font-size:8px;color:#FFF;'> ".$FALTADO_C ." </td>";
	echo " <td align='center' style='font-size:8px;color:#FFF;'> ".$FALTADO_S ." </td>";
	echo " <td align='center' style='font-size:8px;color:#FFF;'> ".$LICENCIA." </td>";
	echo " <td align='center' style='font-size:8px;color:#FFF;'> ".$VACACIONES ." </td>";
	echo " <td  align='center' style='font-size:8px;color:#FFF;'> ".$HORA_EXTRA." </td>";
	echo " <td align='center' style='font-size:8px;color:#FFF;'> ".$HORA_DESCUENTO." </td>";
	echo " <td  align='center' style='font-size:8px;color:#FFF;'> ".$COLACION."</td>";
	echo " <td align='center' style='font-size:8px;color:#FFF;'> ".$COLACIONES_EXTRAS."</td>";
	echo " <td align='center'  style='font-size:8px;color:#FFF;'> ".$LOCOMOCION." </td>";
	echo " <td align='center' style='font-size:8px;color:#FFF;'>".$LOCOMOCION_EXTRAS." </td>";
	echo " <td  align='center' style='font-size:8px;color:#FFF;'> ".$FECHA." </td>";
	echo " <td align='center' style='font-size:8px;color:#FFF;'><a style='color:#FFF;' href='scriptEliminarHorasExtras.php?COD=".$COD."'> Eliminar </a></td><tr>";
  }
  
mysql_free_result($result1);

?>
</table>