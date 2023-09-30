<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
<xsl:template match="/">
<html lang="en">
<head>
  <meta charset="utf-8"></meta>
  <meta name="viewport" content="width=device-width, initial-scale=1"></meta>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"></link>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body style="background-color:#FDF1EA;">
  <div class="container mt-3"><br></br>
  <h1 style="color:rgba(255, 99, 71, 0.8);font-size:60px;" align="center" ><font face="cambria"><i><ins><b>BOTIGA DE FATIMA</b></ins></i></font></h1><br></br>
  <form method="POST" action="cistell.php"> 
	  <a href="cistell.php">
	   <img alt="imagen" style="width:4%" src="imatges/cistell.png">
       </img> 
	  </a>
  </form><br></br>
  <h3 style="color:rgba(255, 99, 71, 0.7);" ><font face="Cambria"><b>PRODUCTES:</b></font></h3><br></br>
  <xsl:if test="position() mod 3 = 1">
  <div class="row">
  
  <xsl:for-each select="botiga/producte" > 
  <div class="col-sm-4">           
  <div class="card" style="width:350px">
  
    <div class="card-body" style="border:2px solid Pink;">
      <center><h2 class="card-title" style="border:2px solid Violet;"><i><xsl:value-of select="nom"/></i></h2><br></br>
	  <img class="card-img-top" alt="imatge" style="width:80%">
            <xsl:attribute name="src">
            <xsl:value-of select="imatge"/>
            </xsl:attribute>
      </img></center><br></br>
      <p class="card-body" style="border:2px solid Violet;"><font face="calibri">
	          <b>Descripció: </b> <xsl:value-of select="descripcio"/><br></br>
	          <b>Preu: </b><xsl:value-of select="preu"/><br></br>
	          <b>Iva inclosa en el preu: </b><xsl:value-of select="iva"/></font></p>
	  <p class="card-footer"><font face="calibri">
	           <b>Tipus: </b><xsl:value-of select="tipus"/><br></br>
	           <b>Quantitat: </b> <xsl:value-of select="quantitat"/></font></p><br></br>
			   
	  <form method="POST" action="compra.php" align="right">
	  <input type="hidden" name="imatge">
	            <xsl:attribute name="value">
	            <xsl:value-of select="imatge"/>
				</xsl:attribute>
	  </input>
	  <input type="hidden" name="iva">
	            <xsl:attribute name="value">
	            <xsl:value-of select="iva"/>
				</xsl:attribute>
	  </input>
	  <input type="hidden" name="nom">
	            <xsl:attribute name="value">
	            <xsl:value-of select="nom"/>
				</xsl:attribute>
	  </input> 
      <input type="hidden" name="codi">
	            <xsl:attribute name="value">
	            <xsl:value-of select="codi"/>
				</xsl:attribute>
	  </input>  
	  <input type="hidden" name="preu">
	            <xsl:attribute name="value">
	            <xsl:value-of select="preu"/>
				</xsl:attribute>
	  </input> 
	  <input type="number" value="quantitat" name="quantitat" min="1" max="{quantitat}">
	            <xsl:attribute name="required">true</xsl:attribute>
	  </input>
	  <input type="submit" class="btn btn-danger" value="Comprar"></input>
	  </form>
	 </div>
  </div>
  <br></br>
  </div>
  </xsl:for-each>
  
  </div>
  </xsl:if>
 </div>
</body>
</html>
</xsl:template>
</xsl:stylesheet>