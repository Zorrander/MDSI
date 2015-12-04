<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
  <xsl:template match="/">
    <html>
      <head>
        <title>Mes matieres</title>
      </head>
      <body>
        <ul>
        <xsl:for-each select="//matiere">
          <xsl:variable name="nom" select="name" />
          <xsl:variable name="code" select="code" />
          <li><xsl:value-of select="$nom"/> : <xsl:value-of select="$code"/></li>
          </xsl:for-each>
        </ul>
      </body>
    </html>
   </xsl:template>
 </xsl:stylesheet>