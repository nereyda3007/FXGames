package po;

import java.io.IOException;

import org.openqa.selenium.By;
import org.openqa.selenium.JavascriptExecutor;
import org.openqa.selenium.WebDriver;
import org.openqa.selenium.WebElement;
import org.openqa.selenium.support.ui.ExpectedConditions;
import org.openqa.selenium.support.ui.Select;
import org.openqa.selenium.support.ui.WebDriverWait;

public class FxgamesAdministradorPage {
	//Declarar las variables para luego inicializar los objetos
	private WebDriver driver;
	private WebDriverWait wait;
	private JavascriptExecutor js;
	
	/**
	 * Declarar constructor para que reciban el driver y wait de la clase Test así como el JavascriptExecutor
	 * @param driver
	 * @param wait
	 */
	public FxgamesAdministradorPage (WebDriver driver, WebDriverWait wait) {
		this.driver = driver;
		this.wait = wait;
		js = (JavascriptExecutor) this.driver;
	}
	
	/**
	 * Búsqueda de elementos de la página, WebElements sin valor todavía
	 */
	private By byPermisos = By.xpath("/html/body/div[6]/div[1]/nav/ul/li[1]/a/b");
	private By byEmailPermisos = By.xpath("/html/body/div[6]/div[2]/div/div[2]/div/div/form/div[1]/input");
	private By byDarPermisos = By.xpath("/html/body/div[6]/div[2]/div/div[2]/div/div/form/div[2]/button[1]");
	private By byQuitarPermisos = By.name("quitar");
	private By byAlertPermisos = By.xpath("/html/body/div[1]/strong");
	private By byAlertQPermisos = By.xpath("/html/body/div[1]/strong");
	private By byEliminarOfertas = By.xpath("/html/body/div[6]/div[2]/div/div[3]/div/div[2]/form/div/button");
	private By byAlertEliminarOfertas = By.xpath("/html/body/div[1]/strong");
	private By byNumOfertas = By.id("numofertas");
	private By byPorcentaje = By.id("porcentaje");
	private By byGenerarOfertas = By.name("generarOfertas");
	private By byAlertGenerarOfertas = By.xpath("/html/body/div[1]/strong");
	private By byNomProducto = By.name("nomProducto");
	private By byPorcentajeEspecifico = By.id("porcentaje2");
	private By byBuscarProducto = By.name("buscarProducto");
	private By byConfirmarDesc = By.name("aplicarDesc");
	private By byAlertDescAplicado = By.xpath("/html/body/div[1]/strong");
	private By byRegistrarProd = By.xpath("/html/body/div[6]/div[1]/nav/ul/li[2]/a/b");
	private By byTipo = By.id("tipo");
	private By byTipoMerchan = By.xpath("/html/body/div[6]/div[2]/div/div[1]/div/div/form/div[1]/select/option[4]");
	private By byCategoria = By.id("cat");
	private By byCatRopa = By.xpath("/html/body/div[6]/div[2]/div/div[1]/div/div/form/div[2]/select/option[3]");
	private By byTituloProd = By.id("titulo");
	private By byDescripcion = By.id("descripcion");
	private By byPrecio = By.id("precio");
	private By byStock = By.id("stock");
	private By byFecha = By.id("fecha");
	private By byImg = By.xpath("/html/body/div[6]/div[2]/div/div[1]/div/div/form/div[15]/div/div[2]/input");
	private By byFicheroElegido = By.id("ficheroElegido");
	private By byRegistrar = By.name("registrar");
	private By byAlertRegistro = By.xpath("/html/body/div[1]/strong");
	private By byNProducto = By.id("nProducto");
	private By byEliOferta = By.name("eliOferta");
	private By byAlertEliOferta = By.xpath("/html/body/div[1]/strong");
	private WebElement permisos;
	private WebElement emailPermisos;
	private WebElement darPermisos;
	private WebElement quitarPermisos;
	private WebElement alertPermisos;
	private WebElement alertQPermisos;
	private WebElement eliminarOfertas;
	private WebElement alertEliminarOfertas;
	private WebElement numOfertas;
	private WebElement porcentaje;
	private WebElement generarOfertas;
	private WebElement alertGenerarOfertas;
	private WebElement nomProducto;
	private WebElement porcentajeEspecifico;
	private WebElement buscarProducto;
	private WebElement confirmarDesc;
	private WebElement alertDescAplicado;
	private WebElement registrarProd;
	private WebElement tipoMerchan;
	private WebElement categoria;
	private WebElement catRopa;
	private WebElement titulo;
	private WebElement descripcion;
	private WebElement precio;
	private WebElement stock;
	private WebElement fecha;
	private WebElement imgPpal;
	private WebElement registrar;
	private WebElement alertRegistrar;
	private WebElement nProducto;
	private WebElement eliOferta;
	private WebElement alertEliOferta;
	private WebElement ficheroElegido;
	
	/**
	 * Métodos para interactuar con los elementos de la página arriba expuestos
	 */
	public void pulsarPermisosAdministrador() {
		//Seteo del elemento
		permisos = driver.findElement(byPermisos);
		wait.until(ExpectedConditions.elementToBeClickable(permisos));
		permisos.click();
	}
	
	public void escribirEmailPermisos(String texto) {
		//Seteo del elemento
		emailPermisos = driver.findElement(byEmailPermisos);
		wait.until(ExpectedConditions.visibilityOf(emailPermisos));
		emailPermisos.sendKeys(texto);
	}
	
	public void pulsarDarPermisos() {
		//Seteo del elemento
		darPermisos = driver.findElement(byDarPermisos);
		wait.until(ExpectedConditions.elementToBeClickable(darPermisos));
		darPermisos.click();
	}
	
	public void pulsarQuitarPermisos() {
		//Seteo del elemento
		quitarPermisos = driver.findElement(byQuitarPermisos);
		wait.until(ExpectedConditions.elementToBeClickable(quitarPermisos));
		quitarPermisos.click();
	}
	
	public String leerAlertPermisos() {
		alertPermisos = driver.findElement(byAlertPermisos);
		wait.until(ExpectedConditions.visibilityOf(alertPermisos));
		return alertPermisos.getText();
	}
	
	public String leerAlertQPermisos() {
		alertQPermisos = driver.findElement(byAlertQPermisos);
		wait.until(ExpectedConditions.visibilityOf(alertQPermisos));
		return alertQPermisos.getText();
	}
	
	public void pulsarEliminarOfertas() {
		//Seteo del elemento
		eliminarOfertas = driver.findElement(byEliminarOfertas);
		wait.until(ExpectedConditions.elementToBeClickable(eliminarOfertas));
		eliminarOfertas.click();
	}
	
	public String leerAlertEliminarOfertas() {
		alertEliminarOfertas = driver.findElement(byAlertEliminarOfertas);
		wait.until(ExpectedConditions.visibilityOf(alertEliminarOfertas));
		return alertEliminarOfertas.getText();
	}
	
	public void escribirNumOfertas(String texto) {
		//Seteo del elemento
		numOfertas = driver.findElement(byNumOfertas);
		wait.until(ExpectedConditions.visibilityOf(numOfertas));
		numOfertas.sendKeys(texto);
	}
	
	public void escribirPorcentaje(String texto) {
		//Seteo del elemento
		porcentaje = driver.findElement(byPorcentaje);
		wait.until(ExpectedConditions.visibilityOf(porcentaje));
		porcentaje.sendKeys(texto);
	}
	
	public void pulsarGenerarOfertas() {
		//Seteo del elemento
		generarOfertas = driver.findElement(byGenerarOfertas);
		wait.until(ExpectedConditions.elementToBeClickable(generarOfertas));
		generarOfertas.click();
	}
	
	public String leerAlertGenerarOfertas() {
		alertGenerarOfertas = driver.findElement(byAlertGenerarOfertas);
		wait.until(ExpectedConditions.visibilityOf(alertGenerarOfertas));
		return alertGenerarOfertas.getText();
	}
	
	public void escribirNomProducto(String texto) {
		//Seteo del elemento
		nomProducto = driver.findElement(byNomProducto);
		wait.until(ExpectedConditions.visibilityOf(nomProducto));
		nomProducto.sendKeys(texto);
	}
	
	public void escribirPorcentajeEspecifico(String texto) {
		//Seteo del elemento
		porcentajeEspecifico = driver.findElement(byPorcentajeEspecifico);
		wait.until(ExpectedConditions.visibilityOf(porcentajeEspecifico));
		porcentajeEspecifico.sendKeys(texto);
	}
	
	public void pulsarBuscarProducto() {
		//Seteo del elemento
		buscarProducto = driver.findElement(byBuscarProducto);
		wait.until(ExpectedConditions.elementToBeClickable(buscarProducto));
		buscarProducto.click();
	}
	
	public void pulsarConfirmarDesc() {
		//Seteo del elemento
		confirmarDesc = driver.findElement(byConfirmarDesc);
		wait.until(ExpectedConditions.elementToBeClickable(confirmarDesc));
		confirmarDesc.click();
	}
	
	public String leerAlertDescAplicado() {
		alertDescAplicado = driver.findElement(byAlertDescAplicado);
		wait.until(ExpectedConditions.visibilityOf(alertDescAplicado));
		return alertDescAplicado.getText();
	}
	
	public void pulsarRegistrarProducto() {
		//Seteo del elemento
		registrarProd = driver.findElement(byRegistrarProd);
		wait.until(ExpectedConditions.elementToBeClickable(registrarProd));
		registrarProd.click();
	}
	
	public void pulsarTipo(String opcion) {
		wait.until(ExpectedConditions.elementToBeClickable(byTipo));
		Select slcTipo = new Select(driver.findElement(byTipo));
		slcTipo.selectByVisibleText(opcion);
	}
	
	public void pulsarTipoMerchan() {
		//Seteo del elemento
		tipoMerchan = driver.findElement(byTipoMerchan);
		wait.until(ExpectedConditions.elementToBeClickable(tipoMerchan));
		tipoMerchan.click();
	}
	
	public void pulsarCategoria() {
		//Seteo del elemento
		categoria = driver.findElement(byCategoria);
		wait.until(ExpectedConditions.elementToBeClickable(categoria));
		categoria.click();
	}
	
	public void pulsarCatRopa() {
		//Seteo del elemento
		catRopa = driver.findElement(byCatRopa);
		wait.until(ExpectedConditions.elementToBeClickable(catRopa));
		catRopa.click();
	}
	
	public void escribirTitulo(String texto) {
		//Seteo del elemento
		titulo = driver.findElement(byTituloProd);
		wait.until(ExpectedConditions.visibilityOf(titulo));
		titulo.sendKeys(texto);
	}
	
	public void escribirDescripcion(String texto) {
		//Seteo del elemento
		descripcion = driver.findElement(byDescripcion);
		wait.until(ExpectedConditions.visibilityOf(descripcion));
		descripcion.sendKeys(texto);
	}
	
	public void escribirPrecio(String texto) {
		//Seteo del elemento
		precio = driver.findElement(byPrecio);
		wait.until(ExpectedConditions.visibilityOf(precio));
		precio.sendKeys(texto);
	}
	
	public void escribirStock(String texto) {
		//Seteo del elemento
		stock = driver.findElement(byStock);
		wait.until(ExpectedConditions.visibilityOf(stock));
		stock.sendKeys(texto);
	}
	
	public void escribirFecha(String texto) {
		//Seteo del elemento
		fecha = driver.findElement(byFecha);
		wait.until(ExpectedConditions.visibilityOf(fecha));
		fecha.sendKeys(texto);
	}
	
	public void escribirFichero() throws IOException, InterruptedException {
		//Seteo del elemento
		imgPpal = driver.findElement(byImg);
		js.executeScript("arguments[0].click();", imgPpal);
		Runtime.getRuntime().exec("C:\\Users\\Nereida admin\\Desktop\\FXGames\\FXGAMES\\scripts_Ait\\Script.exe");
	}
	
	public void pulsarRegistrarProd() throws InterruptedException {
		boolean insertado = false;
		ficheroElegido = driver.findElement(byFicheroElegido);
		//Seteo del elemento
		registrar = driver.findElement(byRegistrar);
		while(!insertado) {
			Thread.sleep(1000);
			String texto = ficheroElegido.getText();
			if (texto.contains(".png")) {
				insertado = true;
			}
		}
		js.executeScript("arguments[0].click();", registrar);
	}
	
	public String leerAlertRegistrar() {
		alertRegistrar = driver.findElement(byAlertRegistro);
		wait.until(ExpectedConditions.visibilityOf(alertRegistrar));
		return alertRegistrar.getText();
	}
	
	public void escribirNProducto(String texto) {
		//Seteo del elemento
		nProducto = driver.findElement(byNProducto);
		wait.until(ExpectedConditions.visibilityOf(nProducto));
		nProducto.sendKeys(texto);
	}
	
	public void pulsarEliOFerta() {
		//Seteo del elemento
		eliOferta = driver.findElement(byEliOferta);
		wait.until(ExpectedConditions.elementToBeClickable(eliOferta));
		eliOferta.click();
	}
	
	public String leerAlertEliOFerta() {
		alertEliOferta = driver.findElement(byAlertEliOferta);
		wait.until(ExpectedConditions.visibilityOf(alertEliOferta));
		return alertEliOferta.getText();
	}
}
