package po;

import org.openqa.selenium.By;
import org.openqa.selenium.WebDriver;
import org.openqa.selenium.WebElement;
import org.openqa.selenium.support.ui.ExpectedConditions;
import org.openqa.selenium.support.ui.WebDriverWait;

public class FxgamesContactoPage {
	//Declarar las variables para luego inicializar los objetos
	private WebDriver driver;
	private WebDriverWait wait;
	
	/**
	 * Declarar constructor para que reciban el driver y wait de la clase Test 
	 * @param driver
	 * @param wait
	 */
	public FxgamesContactoPage (WebDriver driver, WebDriverWait wait) {
		this.driver = driver;
		this.wait = wait;
	}
	
	/**
	 * Búsqueda de elementos de la página, WebElements sin valor todavía
	 */
	private By byAsunto = By.id("titulo");
	private By byNombre = By.id("nombre");
	private By byApellido = By.id("apellido");
	private By byEmail = By.id("email");
	private By byAsuntoMensaje = By.id("asunto");
	private By byEnviar = By.xpath("/html/body/div[1]/div[4]/div/form/div[2]/div[2]/div[2]/div[2]/input[1]");
	private By byAlert = By.xpath("/html/body/div[1]/strong");
	private WebElement asunto;
	private WebElement nombre;
	private WebElement apellido;
	private WebElement email;
	private WebElement asuntoMensaje;
	private WebElement enviar;
	private WebElement alert;
	
	/**
	 * Métodos para interactuar con los elementos de la página arriba expuestos
	 */
	public void escribirAsunto(String texto) {
		//Seteo del elemento
		asunto = driver.findElement(byAsunto);
		wait.until(ExpectedConditions.visibilityOf(asunto));
		asunto.sendKeys(texto);
	}
	
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
	
	public void escribirEmail(String texto) {
		//Seteo del elemento
		email = driver.findElement(byEmail);
		wait.until(ExpectedConditions.visibilityOf(email));
		email.sendKeys(texto);
	}
	
	public void escribirAsuntoMensaje(String texto) {
		//Seteo del elemento
		asuntoMensaje = driver.findElement(byAsuntoMensaje);
		wait.until(ExpectedConditions.visibilityOf(asuntoMensaje));
		asuntoMensaje.sendKeys(texto);
	}
	
	public void pulsarEnviar() {
		//Seteo del elemento
		enviar = driver.findElement(byEnviar);
		wait.until(ExpectedConditions.elementToBeClickable(enviar));
		enviar.click();
	}
	
	public String leerAlert() {
		alert = driver.findElement(byAlert);
		wait.until(ExpectedConditions.visibilityOf(alert));
		return alert.getText();
	}
	
}
