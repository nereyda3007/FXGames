package po;

import org.openqa.selenium.By;
import org.openqa.selenium.JavascriptExecutor;
import org.openqa.selenium.WebDriver;
import org.openqa.selenium.WebElement;
import org.openqa.selenium.support.ui.ExpectedConditions;
import org.openqa.selenium.support.ui.WebDriverWait;

public class FxgamesRegistroPage {
	//Declarar las variables para luego inicializar los objetos
	private WebDriver driver;
	private WebDriverWait wait;
	private JavascriptExecutor js;
	
	/**
	 * Declarar constructor para que reciban el driver y wait de la clase Test así como el JavascriptExecutor
	 * @param driver
	 * @param wait
	 */
	public FxgamesRegistroPage (WebDriver driver, WebDriverWait wait) {
		this.driver = driver;
		this.wait = wait;
		js = (JavascriptExecutor) this.driver;
	}
	
	/**
	 * Búsqueda de elementos de la página, WebElements sin valor todavía
	 */
	private By byNombre = By.id("nombreR");
	private By byApellido = By.id("apellidoR");
	private By byPassword = By.id("pwdR");
	private By byFechaNac = By.id("fecha");
	private By byAcuerdo = By.id("customCheck2");
	private By byCondiciones = By.id("customCheck3");
	private By byRegistrarse = By.xpath("/html/body/div[4]/div/form/div[2]/button");
	private By byAlert = By.xpath("/html/body/div[1]/strong");
	private WebElement nombre;
	private WebElement apellido;
	private WebElement password;
	private WebElement fechaNac;
	private WebElement acuerdo;
	private WebElement condiciones;
	private WebElement registrarse;
	private WebElement alert;
	
	/**
	 * Métodos para interactuar con los elementos de la página arriba expuestos
	 */
	public void escribirNombre(String texto) {
		//Seteo del elemento
		nombre = driver.findElement(byNombre);
		wait.until(ExpectedConditions.visibilityOf(nombre));
		nombre.sendKeys(texto);
	}
	
	public void escribirApellido(String texto) {
		//Seteo del elemento
		apellido = driver.findElement(byApellido);
		wait.until(ExpectedConditions.visibilityOf(apellido));
		apellido.sendKeys(texto);
	}
	
	public void escribirPassword(String texto) {
		//Seteo del elemento
		password = driver.findElement(byPassword);
		wait.until(ExpectedConditions.visibilityOf(password));
		password.sendKeys(texto);
	}
	
	public void escribirFechaNac(String texto) {
		//Seteo del elemento
		fechaNac = driver.findElement(byFechaNac);
		wait.until(ExpectedConditions.visibilityOf(fechaNac));
		fechaNac.sendKeys(texto);
	}
	
	public void pulsarAcuerdo() {
		//Seteo del elemento
		acuerdo = driver.findElement(byAcuerdo);
		js.executeScript("arguments[0].click();", acuerdo);
	}
	
	public void pulsarCondiciones() {
		//Seteo del elemento
		condiciones = driver.findElement(byCondiciones);
		js.executeScript("arguments[0].click();", condiciones);
	}
	
	public void pulsarRegistrarse() {
		//Seteo del elemento
		registrarse = driver.findElement(byRegistrarse);
		wait.until(ExpectedConditions.elementToBeClickable(registrarse));
		registrarse.click();
	}
	
	public String leerAlert() {
		alert = driver.findElement(byAlert);
		wait.until(ExpectedConditions.visibilityOf(alert));
		return alert.getText();
	}
}
