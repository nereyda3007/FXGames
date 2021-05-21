package po;

import org.openqa.selenium.By;
import org.openqa.selenium.WebDriver;
import org.openqa.selenium.WebElement;
import org.openqa.selenium.support.ui.ExpectedConditions;
import org.openqa.selenium.support.ui.WebDriverWait;

public class FxgamesVideojuegoPage {
	//Declarar las variables para luego inicializar los objetos
	private WebDriver driver;
	private WebDriverWait wait;
	
	/**
	 * Declarar constructor para que reciban el driver y wait de la clase Test
	 * @param driver
	 * @param wait
	 */
	public FxgamesVideojuegoPage (WebDriver driver, WebDriverWait wait) {
		this.driver = driver;
		this.wait = wait;
	}
	
	/**
	 * Búsqueda de elementos de la página, WebElements sin valor todavía
	 */
	private By byTituloJuego = By.xpath("/html/body/div[4]/h1[2]");
	private By byIrCesta = By.xpath("/html/body/div[5]/div[3]/a");
	private By byComprar = By.xpath("/html/body/div[5]/div[3]/div/div/div/div[2]/div[2]/form[2]/div/button");
	private WebElement tituloJuego;
	private WebElement cesta;
	private WebElement comprar;
	
	/**
	 * Métodos para interactuar con los elementos de la página arriba expuestos
	 */
	public String leerTitulo() {
		tituloJuego = driver.findElement(byTituloJuego);
		wait.until(ExpectedConditions.visibilityOf(tituloJuego));
		return tituloJuego.getText();
	}
	
	public void pulsarAnadirCesta() {
		//Seteo del elemento
		cesta = driver.findElement(byIrCesta);
		wait.until(ExpectedConditions.elementToBeClickable(cesta));
		cesta.click();
	}
	
	public void pulsarIrCesta() {
		//Seteo del elemento
		comprar = driver.findElement(byComprar);
		wait.until(ExpectedConditions.elementToBeClickable(comprar));
		comprar.click();
	}
}
