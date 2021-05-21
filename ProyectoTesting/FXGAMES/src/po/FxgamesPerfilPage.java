package po;

import org.openqa.selenium.By;
import org.openqa.selenium.WebDriver;
import org.openqa.selenium.WebElement;
import org.openqa.selenium.support.ui.ExpectedConditions;
import org.openqa.selenium.support.ui.WebDriverWait;

public class FxgamesPerfilPage {
	//Declarar las variables para luego inicializar los objetos
	private WebDriver driver;
	private WebDriverWait wait;
	
	/**
	 * Declarar constructor para que reciban el driver y wait de la clase Test 
	 * @param driver
	 * @param wait
	 */
	public FxgamesPerfilPage (WebDriver driver, WebDriverWait wait) {
		this.driver = driver;
		this.wait = wait;
	}
	
	/**
	 * Búsqueda de elementos de la página, WebElements sin valor todavía
	 */
	private By byEmail = By.name("email");
	private By byCrearCuenta = By.xpath("/html/body/div[4]/div[2]/form/button");
	private By byEmailIniciar = By.name("emailI");
	private By byPass = By.id("pwd");
	private By byIniciarSesion = By.xpath("/html/body/div[4]/div[1]/form/button");
	private By byTituloPerfil = By.xpath("/html/body/div[4]/h2");
	private By byAlert = By.xpath("/html/body/div[1]/strong");
	private By byDatosPersonales = By.xpath("/html/body/div[6]/ul/li/a/b");
	private By byNombre = By.id("nombreP");
	private By byPassDatos = By.id("passActual");
	private By byEditarPerfil = By.name("actualizar");
	private By byNombreModificado = By.xpath("/html/body/div[5]/ul[1]/li/div/p[1]/a");
	private By byAdministrador = By.xpath("/html/body/div[3]/nav/ul/li[6]/a/b");
	private By byAdministracion = By.xpath("/html/body/div[3]/nav/ul/li[6]/div/a");
	private By byHistorial = By.xpath("/html/body/div[5]/ul[2]/li/a/b");
	private By byCamion = By.id("camion");
	private By byLocalizador = By.xpath("/html/body/div[5]/ul[2]/li/div/table[1]/tbody[2]/tr/td");
	private WebElement email; 
	private WebElement crearCuenta;
	private WebElement emailIniciar;
	private WebElement pass;
	private WebElement iniciarSesion;
	private WebElement tituloPerfil;
	private WebElement alert;
	private WebElement datosPersonales;
	private WebElement nombre;
	private WebElement passDatos;
	private WebElement editarPerfil;
	private WebElement nombreMoldificado;
	private WebElement administrador;
	private WebElement administracion;
	private WebElement historial;
	private WebElement camion;
	private WebElement localizador;
	
	/**
	 * Métodos para interactuar con los elementos de la página arriba expuestos
	 */
	public void escribirEmail(String texto) {
		//Seteo del elemento
		email = driver.findElement(byEmail);
		wait.until(ExpectedConditions.visibilityOf(email));
		email.sendKeys(texto);
	}
	
	public void pulsarCrearCuenta() {
		//Seteo del elemento
		crearCuenta = driver.findElement(byCrearCuenta);
		wait.until(ExpectedConditions.elementToBeClickable(crearCuenta));
		crearCuenta.click();
	}
	
	public void escribirEmailIniciar(String texto) {
		//Seteo del elemento
		emailIniciar = driver.findElement(byEmailIniciar);
		wait.until(ExpectedConditions.visibilityOf(emailIniciar));
		emailIniciar.sendKeys(texto);
	}
	
	public void escribirPass(String texto) {
		//Seteo del elemento
		pass = driver.findElement(byPass);
		wait.until(ExpectedConditions.visibilityOf(pass));
		pass.sendKeys(texto);
	}
	
	public void pulsarIniciarSesion() {
		//Seteo del elemento
		iniciarSesion = driver.findElement(byIniciarSesion);
		wait.until(ExpectedConditions.elementToBeClickable(iniciarSesion));
		iniciarSesion.click();
	}
	
	public String leerTituloPerfil() {
		tituloPerfil = driver.findElement(byTituloPerfil);
		wait.until(ExpectedConditions.visibilityOf(tituloPerfil));
		return tituloPerfil.getText();
	}
	
	public String leerAlert() {
		alert = driver.findElement(byAlert);
		wait.until(ExpectedConditions.visibilityOf(alert));
		return alert.getText();
	}
	
	public void pulsarDatosPersonales() {
		//Seteo del elemento
		datosPersonales = driver.findElement(byDatosPersonales);
		wait.until(ExpectedConditions.elementToBeClickable(datosPersonales));
		datosPersonales.click();
	}
	
	public void escribirNombre(String texto) {
		//Seteo del elemento
		nombre = driver.findElement(byNombre);
		nombre.clear();
		wait.until(ExpectedConditions.visibilityOf(nombre));
		nombre.sendKeys(texto);
	}
	
	public void escribirPassDatos(String texto) {
		//Seteo del elemento
		passDatos = driver.findElement(byPassDatos);
		wait.until(ExpectedConditions.visibilityOf(passDatos));
		passDatos.sendKeys(texto);
	}
	
	public void pulsarEditarPerfil() {
		//Seteo del elemento
		editarPerfil = driver.findElement(byEditarPerfil);
		wait.until(ExpectedConditions.elementToBeClickable(editarPerfil));
		editarPerfil.click();
	}
	
	public String leerNombreModificado() {
		nombreMoldificado = driver.findElement(byNombreModificado);
		wait.until(ExpectedConditions.visibilityOf(nombreMoldificado));
		return nombreMoldificado.getText();
	}
	
	public void pulsarMenuAdministrador() {
		//Seteo del elemento
		administrador = driver.findElement(byAdministrador);
		wait.until(ExpectedConditions.elementToBeClickable(administrador));
		administrador.click();
	}
	
	public void pulsarAdministracion() {
		//Seteo del elemento
		administracion = driver.findElement(byAdministracion);
		wait.until(ExpectedConditions.elementToBeClickable(administracion));
		administracion.click();
	}
	
	public void pulsarHistorial() {
		//Seteo del elemento
		historial = driver.findElement(byHistorial);
		wait.until(ExpectedConditions.elementToBeClickable(historial));
		historial.click();
	}
	
	public void pulsarCamion() {
		//Seteo del elemento
		camion = driver.findElement(byCamion);
		wait.until(ExpectedConditions.elementToBeClickable(camion));
		camion.click();
	}
	
	public String leerLocalizador() {
		localizador = driver.findElement(byLocalizador);
		wait.until(ExpectedConditions.visibilityOf(localizador));
		return localizador.getText();
	}
}
