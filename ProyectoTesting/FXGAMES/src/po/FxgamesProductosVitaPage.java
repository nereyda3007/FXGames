package po;

import org.openqa.selenium.By;
import org.openqa.selenium.WebDriver;
import org.openqa.selenium.WebElement;
import org.openqa.selenium.support.ui.ExpectedConditions;
import org.openqa.selenium.support.ui.WebDriverWait;

public class FxgamesProductosVitaPage {
	//Declarar las variables para luego inicializar los objetos
	private WebDriver driver;
	private WebDriverWait wait;
	
	/**
	 * Declarar constructor para que reciban el driver y wait de la clase Test
	 * @param driver
	 * @param wait
	 */
	public FxgamesProductosVitaPage (WebDriver driver, WebDriverWait wait) {
		this.driver = driver;
		this.wait = wait;
	}
	
	/**
	 * Búsqueda de elementos de la página, WebElements sin valor todavía
	 */
	private By byTitulo = By.xpath("/html/body/div[4]/h2[2]");
	private By byGenero = By.xpath("/html/body/div[6]/li[5]/a");
	private By byLucha = By.xpath("/html/body/div[6]/li[5]/div/p[3]/a");
	private By byTituloJuego = By.xpath("/html/body/div[7]/div/div/div[2]/div[2]/div/div[1]/h3");
	private By byJuego = By.xpath("/html/body/div[7]/div/div/div[2]/div[1]/div/a/img");
	private WebElement titulo;
	private WebElement genero;
	private WebElement lucha;
	private WebElement tituloJuego;
	private WebElement juego;
	
	/**
	 * Métodos para interactuar con los elementos de la página arriba expuestos
	 */
	public String leerTitulo() {
		titulo = driver.findElement(byTitulo);
		wait.until(ExpectedConditions.visibilityOf(titulo));
		return titulo.getText();
	}
	
	public void pulsarFiltroGenero() {
		//Seteo del elemento
		genero = driver.findElement(byGenero);
		wait.until(ExpectedConditions.elementToBeClickable(genero));
		genero.click();
	}
	
	public void pulsarGeneroLucha() {
		//Seteo del elemento
		lucha = driver.findElement(byLucha);
		wait.until(ExpectedConditions.elementToBeClickable(lucha));
		lucha.click();
	}
	
	public String leerTituloJuego() {
		tituloJuego = driver.findElement(byTituloJuego);
		wait.until(ExpectedConditions.visibilityOf(tituloJuego));
		return tituloJuego.getText();
	}
	
	public void pulsarJuego() {
		//Seteo del elemento
		juego = driver.findElement(byJuego);
		wait.until(ExpectedConditions.elementToBeClickable(juego));
		juego.click();
	}
}
