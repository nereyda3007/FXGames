package po;

import org.openqa.selenium.By;
import org.openqa.selenium.WebDriver;
import org.openqa.selenium.WebElement;
import org.openqa.selenium.support.ui.ExpectedConditions;
import org.openqa.selenium.support.ui.WebDriverWait;

public class FxgamesCestaPage {
	//Declarar las variables para luego inicializar los objetos
	private WebDriver driver;
	private WebDriverWait wait;
	
	/**
	 * Declarar constructor para que reciban el driver y wait de la clase Test 
	 * @param driver
	 * @param wait
	 */
	public FxgamesCestaPage (WebDriver driver, WebDriverWait wait) {
		this.driver = driver;
		this.wait = wait;
	}
	
	/**
	 * Búsqueda de elementos de la página, WebElements sin valor todavía
	 */
	private By byTramitarPedido = By.name("comprar");
	private By byAlert = By.xpath("/html/body/div[1]/strong");
	private By byCantidad = By.name("cantidad");
	private By byActualizar = By.xpath("/html/body/div[4]/table/tbody/tr/td[4]/form/div/input[3]");
	private By byEliminarProducto = By.xpath("/html/body/div[4]/table/tbody/tr/td[6]/a/img");
	private By byCestaVacia = By.xpath("/html/body/div[4]/h1");
	private WebElement comprar;
	private WebElement alert;
	private WebElement cantidad;
	private WebElement actualizar;
	private WebElement eliminar;
	private WebElement cestaVacia;
	
	/**
	 * Métodos para interactuar con los elementos de la página arriba expuestos
	 */
	public void pulsarAceptarCompra() {
		//Seteo del elemento
		comprar = driver.findElement(byTramitarPedido);
		wait.until(ExpectedConditions.elementToBeClickable(comprar));
		comprar.click();
	}
	
	public String leerAlert() {
		alert = driver.findElement(byAlert);
		wait.until(ExpectedConditions.visibilityOf(alert));
		return alert.getText();
	}
	
	public void escribirCantidad(String texto) {
		//Seteo del elemento
		cantidad = driver.findElement(byCantidad);
		cantidad.clear();
		wait.until(ExpectedConditions.visibilityOf(cantidad));
		cantidad.sendKeys(texto);
	}
	
	public void pulsarActualizar() {
		//Seteo del elemento
		actualizar = driver.findElement(byActualizar);
		wait.until(ExpectedConditions.elementToBeClickable(actualizar));
		actualizar.click();
	}
	
	public void pulsarX() {
		//Seteo del elemento
		eliminar = driver.findElement(byEliminarProducto);
		wait.until(ExpectedConditions.elementToBeClickable(eliminar));
		eliminar.click();
	}
	
	public String leerTituloTienda() {
		cestaVacia = driver.findElement(byCestaVacia);
		wait.until(ExpectedConditions.visibilityOf(cestaVacia));
		return cestaVacia.getText();
	}
	
}
